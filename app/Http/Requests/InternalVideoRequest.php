<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{

    public function addVideo()
    {
        return [
            "title" => ["required"],
            "domain" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required"],
            "pic" => ["required"],
            "column" => ["required"],
            "video_url" => ["required"],
            "send_time" => ["required"],
        ];
    }

    public function editVideo()
    {
        return [
            "title" => ["required"],
            "domain" => ["required"],
            "stitle" => ["max:127"],
            "keyword" => ["required", "max:127"],
            "description" => ["required", "max:512"],
            "pic" => ["required"],
            "column" => ["required"],
            "video_url" => ["required"],
            "send_time" => ["required"],
        ];
    }

    public function messages()
    {
        return [

            "title.required" => "标题不能为空",
            "domain.required" => "所属地区必须选择",
            "stitle.max" => "短标题超出字数限制",
            "keyword.required" => "视频关键字必须设置",
            "keyword.max" => "视频关键字超出字数限制",
            "description.required" => "视频描述必须填写",
            "description.max" => "视频描述超出字数限制",
            "pic.required" => "视频图片必须上传",
            "column.required" => "视频栏目必须选择",
            "video_url.required" => "视频必须上传",
            "send_time.required" => "视频发布时间必须选择",
        ];
    }

}
