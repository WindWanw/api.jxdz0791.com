<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Response\ResponseFactory as R;
use App\Http\Controllers\Controller;
use Facades\App\Service\Admin\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * 菜单列表
     *
     * @param Request $r
     * @return void
     */
    public function getMenuList(Request $r)
    {

        $list = AuthService::menu()
            ->children($r->pid)
            ->paginate($r->limit, ["*"]);

        $list = AuthService::getMenuInfo($list);

        return R::ok($list);
    }

    /**
     * 获取菜单的无限极分类信息
     *
     * @param Request $r
     * @return void
     */
    public function getMenus(Request $r)
    {

        $data["list"] = AuthService::_getMenuInfo($r->type);
        $data["check"] = AuthService::_getActions();

        return R::ok($data);
    }

    /**
     * 添加菜单
     *
     * @param Request $r
     * @return void
     */
    public function addMenu(Request $r)
    {

        if (AuthService::addMenu($r->all())) {

            return R::success("添加成功");
        }

        return R::error("添加失败");

    }

    /**
     * 修改菜单
     *
     * @param Request $r
     * @return void
     */
    public function editMenu(Request $r)
    {
        if (AuthService::checkUnique(["title" => $r->title], 'menu', $r->id)) {
            return R::error("菜单标题已经存在，请重新输入");
        }

        if (AuthService::checkUnique(["code" => $r->code], 'menu', $r->id)) {
            return R::error("菜单代码已经存在，请重新输入");
        }

        if (AuthService::editMenu($r->all())) {
            return R::success("修改成功");
        }

        return R::error("修改失败");

    }

    /**
     * 导入菜单
     *
     * @param Request $r
     * @return void
     */
    public function expendMenu(Request $r)
    {

        if (isset($r->name)) {

            if (AuthService::expendMenu($r->name)) {
                return R::success("导入成功！");
            }
        }

        return R::error("文件导入失败，请重新上传正确的文件，再次导入");
    }

    /**
     * 获取角色列表
     *
     * @param Request $r
     * @return void
     */
    public function getRoleList(Request $r)
    {

        $list = AuthService::role()
            ->with(["user" => function ($query) {
                $query->select("id", "username", "nickname");
            }])
            ->orderBy("id", "desc")
            ->paginate($r->limit, ["*"]);

        $list = AuthService::getRoleInfo($list);

        return R::ok($list);
    }

    /**
     * 创建角色
     *
     * @param Request $r
     * @return void
     */
    public function addRole(Request $r)
    {

        if (AuthService::addRole($r->all())) {

            return R::success("添加成功");
        }

        return R::error("添加失败");
    }

    /**
     * 修改角色
     *
     * @param Request $r
     * @return void
     */
    public function editRole(Request $r)
    {
        if (AuthService::editRole($r->all())) {
            return R::success("修改成功");
        }

        return R::error("修改失败");
    }

    /**
     * 获取角色名称
     *
     * @param Request $r
     * @return void
     */
    public function getRoleName(Request $r)
    {
        $list = AuthService::getRoleName($r->type);

        return R::ok($list);
    }

    /**
     * 获取后台用户列表
     *
     * @param Request $r
     * @return void
     */
    public function getUserList(Request $r)
    {

        $orgs = [];
        //获取组织架构父级子级集合
        if (isset($r->org)) {
            $orgs = AuthService::getOrgsList($r->org);
        }

        $list = AuthService::user()
            ->with(
                [
                    "role" => function ($query) {
                        $query->select(["id", "name"]);
                    },
                    "org" => function ($query) {
                        $query->select(["id", "name"]);
                    },
                    "users_info" => function ($query) {
                        $query->select(["id", "user_id", "job_number", "name", "gender"]);
                    },
                ]
            )
            ->whereHas("users_info", function ($query) use ($r) {
                $query->name($r->name);
            })
            ->whereHas("org", function ($query) use ($orgs) {
                $query->org($orgs);
            })
            ->statusT($r->statusT)
            ->status($r->status)
            ->phone($r->phone)
            ->orderBy("id", "desc")
            ->paginate($r->limit);

        $list = AuthService::getUserInfo($list);

        return R::ok($list);
    }

    /**
     * 添加用户
     *
     * @param Request $r
     * @return void
     */
    public function addUser(Request $r)
    {

        if ($r->username == $r->phone) {
            return R::error("账号不能与手机号相同，请修改后提交");
        }

        if (preg_match("/DZ[1-9][0-9]{4}/", $r->username)) {
            return R::error("账号格式错误，不能与工号格式相同，请修改后提交");

        }

        if (AuthService::addUser($r->all())) {

            return R::success("添加成功");
        }

        return R::error("添加失败");

    }

    /**
     * 修改用户
     *
     * @param Request $r
     * @return void
     */
    public function editUser(Request $r)
    {
        if ($r->username == $r->phone) {
            return R::error("账号不能与手机号相同，请修改后提交");
        }

        if (preg_match("/DZ[1-9][0-9]{4}/", $r->username)) {
            return R::error("账号格式错误，不能与工号格式相同，请修改后提交");

        }

        if (AuthService::checkUnique(["username" => $r->username], 'user', $r->id)) {
            return R::error("用户账号已经存在，请重新输入");
        }

        if (AuthService::checkUnique(["phone" => $r->phone], 'user', $r->id)) {
            return R::error("用户手机号已经存在，请重新输入");
        }

        if (AuthService::editUser($r->all())) {
            return R::success("修改成功");
        }

        return R::error("修改失败");

    }
}
