<?php

namespace App\Service\Admin;

use App\Helpers\Extra\Token;
use App\Model\Admin\AdminMenu;
use App\Model\Admin\AdminRoleMenu;
use App\Model\Admin\AdminUser;
use App\Model\Admin\AdminUserToken;
use App\Model\Admin\User;
use App\Service\Service;
use Facades\App\Helpers\Extra\Utils;
use Illuminate\Support\Facades\DB;

/**
 * 处理用户相关数据
 */
class UserService extends Service
{

    public function user()
    {
        return new AdminUser();
    }

    public function token()
    {
        return new AdminUserToken();
    }

    public function menu()
    {
        return new AdminMenu();
    }

    public function role_menu()
    {
        return new AdminRoleMenu();
    }

    /**
     * 根据用户名账号查找用户
     *
     * @param [type] $username
     * @return void
     */
    public function findByUsername($username)
    {

        return $this->user()->where("username", $username)->first();
    }

    /**
     * 根据用户id查找用户
     *
     * @param [type] $uid       用户id
     * @param array $params     输出的参数  可选
     * @return void
     */
    public function findById($uid, $params = [])
    {
        return $params ? $this->user()->select($params)->find($uid) : $this->user()->find($uid);
    }

    /**
     * 根据用户id获取该用户的token信息
     *
     * @param [type] $uid
     * @return void
     */
    public function findToken($uid)
    {
        return $this->token()->where("user_id", $uid)->first();
    }

    /**
     * 处理用户信息
     *
     * @param [type] $user
     * @return void
     */
    public function setUserLoginInfo($user)
    {

        return $this->action(function ($user) {

            $token = $this->findToken($user->id);

            //如果存在token，则更新
            if ($token) {
                $token->access_token = Token::generateToken();
                $token->expired_time = date("Y-m-d H:i:s", \strtotime("+ 7 days"));
                $token->updated_ip = Utils::ipAddress();

                if ($token->save() === false) {
                    return false;
                }

            } else {
                //不存在token，则新增一条token记录
                $token_data = [
                    'user_id' => $user->id,
                    'access_token' => Token::generateToken(),
                    'expired_time' => date("Y-m-d H:i:s", \strtotime("+ 7 days")),
                    'created_ip' => Utils::ipAddress(),
                ];

                if (!$this->token()->create($token_data)) {
                    return false;
                }
            }

            $user->logintime = DB::raw('logintime+1');
            $user->up_ip = $user->last_ip;
            $user->up_time = $user->last_time;
            $user->last_ip = Utils::ipAddress();
            $user->last_time = time();

            if ($user->save() === false) {
                return false;
            }

            return true;

        }, $user);
    }

    /**
     * 处理用户信息
     *
     * @param [type] $user
     * @return void
     */
    public function _setUserLoginInfo($user)
    {
        $token = $this->findToken($user->id);

        DB::beginTransaction();

        try {

            $token->access_token = Token::generateToken();
            $token->expired_time = date("Y-m-d H:i:s", \strtotime("+ 7 days"));
            $token->updated_ip = Utils::ipAddress();

            if ($token->save()) {

                $user->logintime = DB::raw('logintime+1');
                $user->up_ip = $user->last_ip;
                $user->up_time = $user->last_time;
                $user->last_ip = Utils::ipAddress();
                $user->last_time = time();

                if ($user->save()) {
                    DB::commit();
                    return true;
                }
            }

            DB::rollback();

        } catch (\Exception $e) {

            DB::rollback();

            throw new \Exception($e->getMessage());
        }

        return false;
    }

    /**
     * 根据用户id获取用户登录信息
     *
     * @param [type] $uid
     * @return void
     */
    public function getUserLoginInfo($uid)
    {

        return $this->user()
            ->with(["token" => function ($query) {
                $query->select("user_id", 'access_token', 'expired_time');
            }])
            ->find($uid);
    }

    /**
     * 获取用户授权的权限菜单
     *
     * @param [type] $uid       用户id
     * @return void
     */
    public function getUserPath()
    {

        $role_id = $this->getRoleId();

        $list = [];

        if ($role_id) {

            $menu_ids = $this->getArrayValue($this->role_menu()->where("role_id", $role_id)->get(["menu_id"]), "menu_id");

            if ($menu_ids) {
                $list = $this->menu()->whereIn("id", $menu_ids)->get(["id", "code", "status"]);
            }

        }

        return $list;
    }

    /**
     * 修改密码
     *
     * @param [type] $data
     * @return void
     */
    public function editPassword($data)
    {

        $user = $this->findById($data["id"]);

        $password = isset($data["password"]) ? $data["password"] : "123456";

        $user->password = \password_hash($password, PASSWORD_DEFAULT);

        return $user->save();
    }

}
