<?php

namespace App\Http\Requests\Validate;

//路由对应验证器的名称对应关系
class Process
{

    public static function processValidator()
    {

        return [
            'admin.login' => 'UserRequest.login',

            'admin.auth.addMenu' => 'MenuRequest.addMenu',
            'admin.auth.editMenu' => 'MenuRequest.editMenu',
            'admin.auth.addRole' => 'RoleRequest.addRole',
            'admin.auth.editRole' => 'RoleRequest.editRole',
            'admin.auth.addUser' => 'UserRequest.addUser',
            'admin.auth.editUser' => 'UserRequest.editUser',
            'admin.user.addUser' => 'UserRequest.addIndexUser',
            'admin.user.editUser' => 'UserRequest.editIndexUser',

            'admin.news.addNewsColumn' => 'NewsColumnRequest.addNewsColumn',
            'admin.news.editNewsColumn' => 'NewsColumnRequest.editNewsColumn',
            'admin.news.addNews' => 'NewsRequest.addNews',
            'admin.news.editNews' => 'NewsRequest.editNews',

            'admin.qualification.addQualificationColumn' => 'QualificationColumnRequest.addQualificationColumn',
            'admin.qualification.editQualificationColumn' => 'QualificationColumnRequest.editQualificationColumn',
            'admin.qualification.addQualification' => 'QualificationRequest.addQualification',
            'admin.qualification.editQualification' => 'QualificationRequest.editQualification',

            'admin.video.addVideoColumn' => 'VideoColumnRequest.addVideoColumn',
            'admin.video.editVideoColumn' => 'VideoColumnRequest.editVideoColumn',
            'admin.video.addVideo' => 'VideoRequest.addVideo',
            'admin.video.editVideo' => 'VideoRequest.editVideo',
            'admin.video.addInternalVideo' => 'InternalVideoRequest.addInternalVideo',
            'admin.video.editInternalVideo' => 'InternalVideoRequest.editInternalVideo',

            'admin.anno.addAnno' => 'AnnoRequest.addAnno',
            'admin.anno.editAnno' => 'AnnoRequest.editAnno',

            'admin.nav.addNavColumn' => 'NavColumnRequest.addNavColumn',
            'admin.nav.editNavColumn' => 'NavColumnRequest.editNavColumn',

            'admin.system.addDomainArea' => 'DomainAreaRequest.addDomainArea',
            'admin.system.editDomainArea' => 'DomainAreaRequest.editDomainArea',
        ];
    }
}
