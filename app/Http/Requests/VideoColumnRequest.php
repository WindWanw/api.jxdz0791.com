<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoColumnRequest extends FormRequest
{
    public function addVideoColumn()
    {
        return [
            "title" => ["required", "unique:new_columns"],
            "link_url" => ["required", "unique:new_columns"],
        ];
    }

    public function editVideoColumn()
    {
        return [
            "title" => ["required"],
            "link_url" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "视频栏目标题不能为空",
            "title.unique" => "视频栏目标题重复，请重新输入",
            "link_url.required" => "视频栏目跳转地址不能为空",
            "link_url.unique" => "视频栏目跳转地址重复，请重新输入",
        ];
    }
}
