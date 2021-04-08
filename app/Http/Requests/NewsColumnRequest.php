<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsColumnRequest extends FormRequest
{
    public function addNewsColumn()
    {
        return [
            "title" => ["required", "unique:new_columns"],
            "link_url" => ["required", "unique:new_columns"],
        ];
    }

    public function editNewsColumn()
    {
        return [
            "title" => ["required"],
            "link_url" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "新闻栏目标题不能为空",
            "title.unique" => "新闻栏目标题重复，请重新输入",
            "link_url.required" => "新闻栏目跳转地址不能为空",
            "link_url.unique" => "新闻栏目跳转地址重复，请重新输入",
        ];
    }
}
