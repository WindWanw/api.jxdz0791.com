<?php

namespace App\Http\Middleware;

use App\Helpers\Response\Enum;
use App\Helpers\Response\ResponseFactory as R;
use App\Model\Admin\AdminUser;
use App\Model\Admin\AdminUserToken;
use Closure;
use \App;
use \Request;

class AuthMiddleware
{

    private $user;
    private $auth;
    private $role;

    public function handle($request, Closure $next)
    {
        $token = Request::header('X-Authorization');

        //根据相关token查找用户
        $this->auth = AdminUserToken::where('access_token', $token)
            ->where('expired_time', '>=', date('Y-m-d H:i:s', time()))
            ->first();
        if (empty($token) || empty($this->auth)) {
            return R::error('登录信息失效，需从新登录', Enum::USER_LOGIN_ERROR);
        }

        $this->user = AdminUser::with(["role" => function ($query) {
            $query->select(["id", "status"]);
        }])->find($this->auth->user_id);

        if (!$this->user->status) {
            return R::error('您的账户信息被锁定，详情请联系管理员', Enum::USER_LOGIN_ERROR);
        }

        if (!$this->user->role || !$this->user->role->status) {
            return R::error("当前账户角色被禁用！", Enum::ROLE_FORBID);
        }

        //如果不是超级管理员，则验证路由权限
        // if ($this->role->roles->role_code != 'ADMIN') {

        //     $action = AdminRoleAction::getRolePath($this->role->role_id);

        //     $white_list = Whitelist::$admin_role_white_router;

        //     $router = array_merge($action, $white_list);

        //     if (!in_array(Route::currentRouteName(), $router)) {
        //         return R::error("您没有该权限" . Route::currentRouteName(), Error::ADMIN_USER_AUTH_ERROR);
        //     }

        // }

        App::singleton('App\Helpers\Instance\Token', function ($app) {
            $user = new \stdClass();
            $user->userId = $this->auth->user_id;
            $user->accessToken = $this->auth->access_token;
            $user->expiredTime = $this->auth->expired_time;
            $user->roleId = $this->user->role ? $this->user->role->id : "";
            return $user;
        });

        return $next($request);
    }

}
