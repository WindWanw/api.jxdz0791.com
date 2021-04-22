<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

    public function addCustomer()
    {

        return [
            "customer_type" => ["required"],
            "number" => ["required", "unique:customer"],
            "name" => ["required"],
            "type" => ["required"],
            "source" => ["required"],
        ];
    }

    public function editCustomer()
    {
        return [
            "customer_type" => ["required"],
            "number" => ["required"],
            "name" => ["required"],
            "type" => ["required"],
            "source" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "customer_type.required" => "客户类型必须选择",
            "number.required" => "客户编号不能为空",
            "number.unique" => "客户编号已存在，请重新填写",
            "name.required" => "客户名称不能为空",
            "type.required" => "业务类别不能为空",
            "source.required" => "客户来源不能为空",
        ];
    }
}
