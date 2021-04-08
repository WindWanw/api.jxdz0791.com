<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnoRequest extends FormRequest
{

    public function addAnno()
    {
        return [
            'title' => ['required'],
            'domain' => ['required'],
        ];
    }

    public function editAnno()
    {
        return [
            'title' => ['required'],
            'domain' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'domain.required' => '所属地区必须选择',
        ];
    }
}
