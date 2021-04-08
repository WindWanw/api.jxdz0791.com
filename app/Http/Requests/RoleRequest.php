<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function addRole()
    {
        return [
            "name" => ["required"],
        ];
    }

    public function editRole()
    {
        return [
            "name" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "角色名称必须填写",
        ];
    }
}
