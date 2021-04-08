<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    private $phoneRegex = 'regex:/^1[3-9]\d{9}$/';

    public function login()
    {

        return [
            'username' => ['required'],
            'password' => ['required'],

        ];
    }

    public function addUser()
    {
        return [
            'username' => ['required', 'unique:admin_users'],
            'password' => ['required'],
            'phone' => ['required', $this->phoneRegex, 'unique:admin_users'],
            'role' => ['required'],
        ];
    }

    public function editUser()
    {
        return [
            'username' => ['required'],
            'phone' => ['required', $this->phoneRegex],
            'role' => ['required'],
        ];
    }

    public function addIndexUser()
    {
        return [
            'username' => ['required', 'unique:user'],
            'password' => ['required'],
            'phone' => ['required', $this->phoneRegex, 'unique:user'],
        ];
    }

    public function editIndexUser()
    {
        return [
            'username' => ['required'],
            'phone' => ['required', $this->phoneRegex],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名账号不能为空',
            'username.unique' => '用户名账号重复，请重新输入',
            'password.required' => '密码不能为空',
            'phone.required' => '联系方式不能为空',
            'phone.regex' => '联系方式格式错误',
            'phone.unique' => '联系方式重复，请重新输入',
            'role.required' => '用户角色必须选择',
        ];
    }
}
