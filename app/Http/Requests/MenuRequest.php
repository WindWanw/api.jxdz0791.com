<?php

namespace App\Http\Requests;

use App\Model\Admin\AdminMenu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{
    public function addMenu()
    {

        return [
            'title' => ['required', 'unique:admin_menus'],
            'code' => ['required', 'alpha', 'unique:admin_menus'],

        ];
    }

    public function editMenu()
    {

        return [
            'title' => ['required'],
            'code' => ['required', 'alpha'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '菜单名称必须填写',
            'title.unique' => '菜单名称已经存在，请重新输入',
            'code.required' => '菜单代码必须填写',
            'code.alpha' => '菜单代码必须由字母组成',
            'code.unique' => '菜单代码已经存在，请重新输入',
        ];
    }
}
