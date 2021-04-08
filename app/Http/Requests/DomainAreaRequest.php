<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainAreaRequest extends FormRequest
{

    private $phoneRegex = 'regex:/^1[3-9]\d{9}$/';

    public function addDomainArea()
    {
        return [
            "name" => ["required"],
            "domain" => ["required", "unique:domain_areas"],
        ];
    }

    public function editDomainArea()
    {
        return [
            "name" => ["required"],
            "domain" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "地区名不能为空",
            "domain.required" => "地区域名不能为空",
            "domain.unique" => "地区域名已经存在，请重新输入",
        ];
    }
}
