<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    public function addNews()
    {
        return [
            "title" => ["required"],
            "domain" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required"],
            "pic" => ["required"],
            "column" => ["required"],
            "content" => ["required"],
            "send_time" => ["required"],
        ];
    }

    public function editNews()
    {
        return [
            "title" => ["required"],
            "domain" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required", "max:512"],
            "pic" => ["required"],
            "column" => ["required"],
            "content" => ["required"],
            "send_time" => ["required"],
        ];
    }

    public function messages()
    {
        return [

            "title.required" => "标题不能为空",
            "domain.required" => "所属地区必须选择",
            "stitle.max" => "短标题超出字数限制",
            "keyword.required" => "新闻关键字必须设置",
            "keyword.max" => "新闻关键字超出字数限制",
            "description.required" => "新闻描述必须填写",
            "description.max" => "新闻描述超出字数限制",
            "pic.required" => "新闻图片必须上传",
            "column.required" => "新闻栏目必须选择",
            "content.required" => "新闻内容不能为空",
            "send_time.required" => "新闻发布时间必须选择",
        ];
    }

}
