<?php

namespace App\Http\Requests\Validate;

//路由对应验证器的名称对应关系
class Process
{

    public static function processValidator()
    {

        return [
            'admin.login' => 'UserRequest.login',

            'admin.auth.addMenu' => 'MenuRequest.addMenu',
            'admin.auth.editMenu' => 'MenuRequest.editMenu',
            'admin.auth.addRole' => 'RoleRequest.addRole',
            'admin.auth.editRole' => 'RoleRequest.editRole',
            'admin.auth.addUser' => 'UserRequest.addUser',
            'admin.auth.editUser' => 'UserRequest.editUser',
            'admin.user.addUser' => 'UserRequest.addIndexUser',
            'admin.user.editUser' => 'UserRequest.editIndexUser',

            //客户管理
            'admin.custom.addCustomer' => 'CustomerRequest.addCustomer',
            'admin.custom.editCustomer' => 'CustomerRequest.editCustomer',
        ];
    }
}
