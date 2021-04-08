<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavColumnRequest extends FormRequest
{

    public function addNavColumn()
    {
        return [
            "title" => ["required"],
            "alias" => ["required"],
            "domain" => ["required"],
        ];
    }

    public function editNavColumn()
    {
        return [
            "title" => ["required"],
            "alias" => ["required"],
            "domain" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "标题不能为空",
            "alias.required" => "别名不能为空",
            "domain.required" => "地区域名不能为空",
        ];
    }
}
