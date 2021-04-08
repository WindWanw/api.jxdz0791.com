<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Response\Enum;
use App\Helpers\Response\ResponseFactory as R;
use App\Http\Controllers\Controller;
use Facades\App\Service\Admin\AuthService;
use Facades\App\Service\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * 用户登录
     *
     * @param Request $r
     * @return void
     */
    public function login(Request $r)
    {

        $user = UserService::findByUsername($r->username);

        if (!$user) {
            return R::error("用户账号不存在,请输入正确的账号", Enum::USERNAME_NOT_EXIST);
        }

        if (!password_verify($r->password, $user->password)) {
            return R::error("密码错误，请重新输入！", Enum::PASSWORD_ERROR);
        }

        if (UserService::setUserLoginInfo($user)) {

            $info = UserService::getUserLoginInfo($user->id);

            return R::success(["message" => "登录成功", "info" => $info]);
        }

    }

    /**
     * 获取登录用户的信息
     *
     * @param Request $r
     * @return void
     */
    public function getUserInfo(Request $r)
    {

        $uid = $this->getUserId();

        $data = UserService::findById($uid, ["username", "nickname", "head_img"]);
        $data["path"] = UserService::getUserPath($uid);
        $data["menu"] = AuthService::menu()->status(1)->get(["title", "code"]);

        return R::ok($data);
    }

    /**
     * 重置密码
     *
     * @param Request $r
     * @return void
     */
    public function resetPwd(Request $r)
    {

        if (UserService::editPassword($r->all())) {
            return R::success("修改成功");
        }

        return R::error("修改失败");
    }

    /**
     * 修改密码
     *
     * @param Request $r
     * @return void
     */
    public function editPwd(Request $r)
    {
        if ($r->new_password != $r->repeat_password) {
            return R::error("新密码与确认密码不匹配，请检查后再提交");
        }

        if ($r->password == $r->new_password) {
            return R::error("新密码与旧密码相同，请重新设置");
        }

        $user = UserService::findById($this->getUserId());

        if (!\password_verify($r->password, $user->password)) {
            return R::error("原密码错误！请重新输入");
        }

        $user->password = password_hash($r->new_password, PASSWORD_DEFAULT);

        if ($user->save()) {
            return R::success("修改成功,请重新登录");
        }

        return R::error("修改失败");
    }

}
