<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualificationCriteria extends FormRequest
{
    public function addQualification()
    {
        return [
            "title" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required"],
            "pic" => ["required"],
            "column" => ["required"],
            "content" => ["required"],
            "send_time" => ["required"],
            "author" => ["required"],
        ];
    }

    public function editQualification()
    {
        return [
            "title" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required", "max:512"],
            "pic" => ["required"],
            "column" => ["required"],
            "content" => ["required"],
            "send_time" => ["required"],
            "author" => ["required"],
        ];
    }

    public function messages()
    {
        return [

            "title.required" => "标题不能为空",
            "stitle.max" => "短标题超出字数限制",
            "keyword.required" => "资质标准关键字必须设置",
            "keyword.max" => "资质标准关键字超出字数限制",
            "description.required" => "资质标准描述必须填写",
            "description.max" => "资质标准描述超出字数限制",
            "pic.required" => "资质标准图片必须上传",
            "column.required" => "资质标准栏目必须选择",
            "content.required" => "资质标准内容不能为空",
            "send_time.required" => "资质标准发布时间必须选择",
            "author.required" => "资质标准作者不能为空",
        ];
    }
}
