<?php

namespace App\Service\Admin;

use App\Model\Admin\AdminMenu;
use App\Model\Admin\AdminRole;
use App\Model\Admin\AdminRoleMenu;
use App\Model\Admin\AdminUser;
use App\Model\Admin\AdminUserRole;
use App\Service\Service;
use Facades\App\Helpers\Extra\Utils;
use Illuminate\Support\Facades\DB;

class AuthService extends Service
{

    public function menu()
    {
        return new AdminMenu();
    }

    public function role()
    {
        return new AdminRole();
    }

    public function role_menu()
    {
        return new AdminRoleMenu();
    }

    public function user()
    {
        return new AdminUser();
    }

    public function user_role()
    {
        return new AdminUserRole();
    }

    /**
     * 根据id获取菜单信息
     *
     * @param [type] $id
     * @return void
     */
    public function findMenuById($id)
    {

        return $this->menu()->find($id);
    }

    /**
     * 判断菜单是否有子级
     *
     * @param [type] $id
     * @return boolean
     */
    public function hasChildren($id)
    {

        return (bool) $this->menu()->where("pid", $id)->count();
    }

    /**
     * 处理菜单相关
     *
     * @param [type] $object    菜单模型实例
     * @return void
     */
    public function getMenuInfo($object)
    {

        foreach ($object as $key => $value) {
            $object[$key]["hasChildren"] = $this->hasChildren($value->id);
        }

        return $object;
    }

    /**
     * 菜单无限极分类
     *
     * @param integer $type 1输出顶级菜单
     * @return void
     */
    public function _getMenuInfo($type = 1)
    {

        $_data = $type ? [["id" => "0", "title" => "顶级菜单", "status" => 1]] : [];

        $data = $this->_g();

        return array_merge($_data, $data);

    }

    /**
     * 菜单无限极分类
     *
     * @param integer $pid
     * @return void
     */

    private function _g($pid = 0)
    {
        $list = $this->menu()->get(["id", "title", "pid", "status"])->toArray();

        $data = [];

        if ($list) {

            foreach ($list as $key => $value) {
                if ($value["pid"] == $pid) {
                    $v = $value;
                    $v["id"] = (string) $value["id"];
                    $v["children"] = $this->_g($value["id"]);
                    $data[] = array_filter($v, function ($d) {
                        if ($d == 0 || $d == "0" || $d) {
                            return true;
                        } else {
                            return false;
                        }
                    });
                }
            }
        }

        return $data;

    }

    /**
     * 添加菜单
     *
     * @param array $data
     * @return void
     */
    public function addMenu(array $data)
    {

        $menu = $this->menu();

        $menu->pid = $this->getArrayEndData($data["pid"]);

        $menu->title = $data["title"];
        $menu->code = $data["code"];
        $menu->status = $data["status"];

        $menu->level = $menu->pid ? $this->findMenuById($menu->pid)->level + 1 : 1;

        return $menu->save();
    }

    /**
     * 添加菜单
     *
     * @param array $data
     * @return void
     */
    public function editMenu(array $data)
    {

        $menu = $this->findMenuById($data["id"]);

        $menu->pid = $this->getArrayEndData($data["pid"]);
        $menu->title = $data["title"];
        $menu->code = $data["code"];
        $menu->status = $data["status"];

        $menu->level = $menu->pid ? $this->findMenuById($menu->pid)->level + 1 : 1;

        return $menu->save();
    }

    /**
     * 导入文件
     *
     * @param [type] $classname
     * @return void
     */
    public function expendMenu($classname)
    {

        if (class_exists($classname)) {

            try {
                $menu = (new $classname())->config();

                return $this->action(function ($menu) {

                    //循环添加菜单
                    $this->saveAllMenu($menu);

                    //先删除超级管理员绑定的所有菜单id
                    if (!$this->role_menu()->where("role_id", 1)->delete()) {
                        return false;
                    }

                    //获取所有菜单id
                    $menu_id = $this->getArrayValue($this->menu()->get(["id"]), "id");

                    foreach ($menu_id as $key => $value) {

                        //超级管理员默认绑定所有
                        if (!$this->role_menu()->create(["role_id" => 1, "menu_id" => $value])) {
                            return false;
                        }
                    }

                    return true;

                }, $menu);

            } catch (\Exception $e) {
                // throw new \Exception($e->getMessage());
                return false;
            }

        }

        return false;
    }

    public function saveAllMenu(array $menu, $pid = 0, $level = 1)
    {

        $menu_id = [];

        foreach ($menu as $key => $value) {

            $count = $this->menu()->code($value["name"])->count();

            if ($count) {
                $m = $this->menu()->code($value["name"])->first();

            } else {
                $m = $this->menu();

            }

            $m->pid = $pid;
            $m->title = $value["meta"]["name"];
            $m->code = $value["name"];
            $m->status = 1;
            $m->level = $level;

            $m->save();

            if (isset($value["children"])) {
                $this->saveAllMenu($value["children"], $m->id, $level + 1);
            }

        }

    }

    /**
     * 通过菜单id获取其父id
     *
     * @param [type] $menu_id
     * @return void
     */
    public function getMenuPid($menu_id, $key = 0)
    {

        //判断是否是数组，如果不是，则改成数组
        $menu_id = \is_array($menu_id) ? $menu_id : [$menu_id];

        $pid = $this->menu()->whereIn("id", $menu_id)->get(["pid"]);

        $pids = \array_filter($this->getArrayValue($pid, "pid"));

        $data = [];

        if ($pids) {
            $data = \array_merge($pids, $this->getMenuPid($pids, $key + 1));
        }

        return $data;

    }

    /**
     * 获取角色绑定的所有菜单
     *
     * 通过上传的子菜单id获取其父菜单id
     *
     * @param [type] $menu_id
     * @return void
     */
    public function _getRoleMenuId($menu_id)
    {

        return \array_unique(\array_merge($menu_id, $this->getMenuPid($menu_id)));
    }

    /**
     * 添加角色
     *
     * 使用数据库事务封装函数操作
     *
     * @param array $data
     * @return void
     */
    public function addRole(array $data)
    {

        $role = $this->role();

        $role_menu = $this->role_menu();

        return $this->action(function ($role, $role_menu, $data) {

            $role->name = $data["name"];
            $role->describe = $data["describe"];
            $role->create_id = $this->getUserId();
            $role->status = $data["status"];

            //如果角色信息插入失败，返回false
            if ($role->save() === false) {
                return false;
            }

            //如果存在菜单id数组
            if (isset($data["menu_id"])) {

                $menu_ids = $this->_getRoleMenuId($data["menu_id"]);

                foreach ($menu_ids as $value) {

                    if (!$role_menu->create(["role_id" => $role->id, "menu_id" => $value])) {
                        return false;
                    }
                }

            }

            return true;

        }, $role, $role_menu, $data);

    }

    /**
     * 添加角色
     *
     * @param array $data
     * @return void
     */
    public function _addRole(array $data)
    {

        $role = $this->role();

        DB::beginTransaction();

        try {
            $role->name = $data["name"];
            $role->describe = $data["describe"];
            $role->create_id = $this->getUserId();
            $role->status = $data["status"];

            if ($role->save()) {

                if (isset($data["menu_id"])) {
                    $rm = $this->role_menu();

                    foreach ($data["menu_id"] as $value) {

                        $rm->create(["role_id" => $role->id, "menu_id" => $value]);
                    }

                }

                DB::commit();
                return true;

            }

            DB::rollback();

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage());

        }

        return false;

    }

    /**
     * 修改角色
     *
     * @param array $data
     * @return void
     */
    public function editRole(array $data)
    {
        $role = $this->role()->find($data["id"]);

        $role_menu = $this->role_menu();

        return $this->action(function ($role, $role_menu, $data) {
            $role->name = $data["name"];
            $role->describe = $data["describe"];
            $role->status = $data["status"];
            $role->modifier_id = $this->getUserId();

            if ($role->save() === false) {
                return false;
            }

            if (isset($data["menu_id"])) {

                //修改角色绑定的菜单id，先删除现有的该角色下的菜单id
                if ($role_menu->where("role_id", $data["id"])->delete() === false) {
                    return false;
                }

                $menu_ids = $this->_getRoleMenuId($data["menu_id"]);

                //再将传入的菜单id添加
                foreach ($menu_ids as $value) {

                    if (!$role_menu->create(["role_id" => $role->id, "menu_id" => $value])) {
                        return false;
                    }
                }
            }

            return true;

        }, $role, $role_menu, $data);

    }

    /**
     * 处理角色列表信息
     *
     * @param [type] $object
     * @return void
     */
    public function getRoleInfo($object)
    {

        foreach ($object as $key => $value) {

            $object[$key]['creater'] = $value->user->nickname ?? $value->user->username;
            $object[$key]['menu_id'] = $this->getRoleMenuId($value->id);
        }

        return $object;
    }

    /**
     * 获取角色名称
     *
     * @param integer $type -1所有，1显示启用的，0显示禁用的
     * @return void
     */
    public function getRoleName($type = -1)
    {

        $role = $this->role();

        if ($type != -1) {
            $role = $role->status($type);
        }

        return $role->get(["id", "name"]);
    }

    /**
     * 获取角色授权的菜单id
     *
     * @param [type] $rid   角色id
     * @return void
     */
    public function getRoleMenuId($rid)
    {

        $list = $this->role_menu()->where("role_id", $rid)->get(["menu_id"]);

        $data = [];

        foreach ($list as $key => $value) {

            $hasChildren = $this->hasChildren($value->menu_id);

            if (!$hasChildren) {
                $data[] = $value->menu_id;
            }
        }

        return $data;

    }

    /**
     * 处理用户信息
     *
     * @param [type] $object
     * @return void
     */
    public function getUserInfo($object)
    {

        foreach ($object as $key => $value) {
            // $object[$key]["role"] = $value->role->name;
        }

        return $object;
    }

    /**
     * 添加用户
     *
     * @param [type] $data
     * @return void
     */
    public function addUser($data)
    {

        $user = $this->user();

        $user_role = $this->user_role();

        return $this->action(function ($user, $user_role, $data) {

            $user->username = $data["username"];
            $user->phone = $data["phone"];
            $user->password = \password_hash($data["password"], PASSWORD_DEFAULT);
            $user->reg_ip = Utils::ipAddress();
            $user->reg_time = time();
            $user->status = $data["status"];

            if ($user->save() === false) {
                return false;
            }

            if (!$user_role->create(["user_id" => $user->id, "role_id" => $data["role"]])) {
                return false;
            }

            return true;

        }, $user, $user_role, $data);
    }

    /**
     * 添加用户
     *
     * @param [type] $data
     * @return void
     */
    public function editUser($data)
    {

        $user = $this->user()->find($data["id"]);

        $user_role = $this->user_role();

        return $this->action(function ($user, $user_role, $data) {

            $user->username = $data["username"];
            $user->phone = $data["phone"];
            $user->status = $data["status"];

            if ($user->save() === false) {
                return false;
            }

           $user_role->where("user_id", $user->id)->update(["role_id" => $data["role"]]);

            return true;

        }, $user, $user_role, $data);
    }

}
