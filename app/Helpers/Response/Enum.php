<?php
namespace App\Helpers\Response;

class Enum
{
    const OK = 0;

    const FAIL = 4000;
    const USERNAME_NOT_EXIST = 4001; //用户账号不存在

    const ERROR = 5000;
    const VALIDATE_ERROR = 5001; //验证错误
    const PASSWORD_ERROR = 5002; //密码错误
    const USER_LOGIN_ERROR = 5003; //用户登录错误
    const ROLE_FORBID = 5004; //角色被禁用

    const IMAGE_TYPE_ERROR=5005;//图片类型错误
    const IMAGE_SIZE_ERROR=5007;//图片大小错误

    // public function __callStatic($name, $arguments)
    // {

    //     return constant('self::' . strtoupper($name));

    // }
}
