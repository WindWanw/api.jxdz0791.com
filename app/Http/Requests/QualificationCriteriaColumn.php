<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualificationCriteriaColumn extends FormRequest
{
    public function addQualificationColumn()
    {
        return [
            "title" => ["required", "unique:qualification_criteria_columns"],
            "link_url" => ["required", "unique:qualification_criteria_columns"],
        ];
    }

    public function editQualificationColumn()
    {
        return [
            "title" => ["required"],
            "link_url" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "资质标准栏目标题不能为空",
            "title.unique" => "资质标准栏目标题重复，请重新输入",
            "link_url.required" => "资质标准栏目跳转地址不能为空",
            "link_url.unique" => "资质标准栏目跳转地址重复，请重新输入",
        ];
    }
}
