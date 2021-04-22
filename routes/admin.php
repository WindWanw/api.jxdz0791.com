<?php

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
|   后台路由
|
 */

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['validation'],
], function ($router) {

    $router->any('index', 'TestController@index');
    $router->post('home', 'TestController@home');

    //登录
    $router->post('login', 'UserController@login')->name('admin.login');

    //公共组
    $router->group([
        'prefix' => 'common',
    ], function ($router) {

        //后台相关操作（必须登录后的用户操作）
        $router->group([
            'middleware' => ['auth.user', 'operation'],
        ], function ($router) {
            //启用禁用操作
            $router->post('processStatus', 'CommonController@processStatus');
            //删除
            $router->post('delete', 'CommonController@delete');

        });

        //上传文件
        $router->post('upload', 'CommonController@upload');
        //文件下载
        $router->get('download', 'CommonController@download');

        //判断文件是否存在
        $router->get('hasFile', 'CommonController@hasFile');
        //七牛云token
        $router->get('getQiniuToken', 'CommonController@getQiniuToken');
        //上传七牛云文件地址
        $router->get('getFileName', 'CommonController@getFileName');
        //客户管理配置
        $router->get('getCustomerConfig', 'CommonController@getCustomerConfig');
    });

    //权限组
    $router->group([
        'middleware' => ['auth.user', 'operation'],
    ], function ($router) {

        //用户管理
        $router->group([
            'prefix' => 'user',
        ], function ($router) {

            //获取用户信息
            $router->get('getUserInfo', 'UserController@getUserInfo');
            //重置密码
            $router->post('resetPwd', 'UserController@resetPwd');
            //修改密码
            $router->post('editPwd', 'UserController@editPwd');

        });

        //客户管理
        $router->group([
            'prefix' => 'custom',
        ], function ($router) {

            //客户列表 my我的，all全部 lower下级客户
            $router->get('getCustomerlist', "CustomController@getCustomerlist");
            //添加客户
            $router->post('addCustomer', "CustomController@addCustomer")->name("admin.custom.addCustomer");
            //修改客户
            $router->post('editCustomer', "CustomController@editCustomer")->name("admin.custom.editCustomer");

            //跟进记录
            $router->get('getFollowUpRecord', "CustomController@getFollowUpRecord");
            //添加跟进
            $router->post('addFollowUp', 'CustomController@addFollowUp')->name("admin.custom.addFollowUp");
            //回复跟进
            $router->post('addFollowUpRemarks', 'CustomController@addFollowUpRemarks')->name("admin.custom.addFollowUpRemarks");
            //负责人信息
            $router->get('getHeadUser', 'CustomController@getHeadUser');
            //添加转交信息
            $router->post('addTransInfo', 'CustomController@addTransInfo')->name("admin.custom.addTransInfo");

            //客户列表 my我的，all全部 lower下级客户
            $router->get('{type}/list/', "CustomController@list")->where("type", "^(my|all|lower)$");
        });

        //系统管理
        $router->group([
            'prefix' => 'system',
        ], function ($router) {

            //获取地区树形数据
            $router->get('getAreaTree', 'SystemController@getAreaTree');
            //获取地区列表
            $router->get('getAreaList', 'SystemController@getAreaList');
            //添加地区
            $router->post('addArea', 'SystemController@addArea')->name('admin.system.addArea');
            //修改地区
            $router->post('editArea', 'SystemController@editArea')->name('admin.system.editArea');

            //获取资质树形数据
            $router->get('getQualiTree', 'SystemController@getQualiTree');
            //添加资质
            $router->post('addQuali', 'SystemController@addQuali')->name('admin.system.addQuali');
            //修改资质
            $router->post('editQuali', 'SystemController@editQuali')->name('admin.system.editQuali');

        });

        //权限管理
        $router->group([
            'prefix' => 'auth',
        ], function ($router) {

            //获取菜单
            $router->get('getMenuList', 'AuthController@getMenuList');
            //获取菜单的无限极分类信息
            $router->get('getMenus', 'AuthController@getMenus');
            //添加菜单
            $router->post('addMenu', 'AuthController@addMenu')->name('admin.auth.addMenu');
            //修改菜单
            $router->post('editMenu', 'AuthController@editMenu')->name('admin.auth.editMenu');
            //导入菜单
            $router->post('expendMenu', 'AuthController@expendMenu');

            //获取角色列表
            $router->get('getRoleList', 'AuthController@getRoleList');
            //添加角色
            $router->post('addRole', 'AuthController@addRole')->name('admin.auth.addRole');
            //修改角色
            $router->post('editRole', 'AuthController@editRole')->name('admin.auth.editRole');
            //获取角色名称
            $router->get('getRoleName', 'AuthController@getRoleName');

            //获取用户列表
            $router->get('getUserList', 'AuthController@getUserList');
            //添加用户
            $router->post('addUser', 'AuthController@addUser')->name('admin.auth.addUser');
            //修改用户
            $router->post('editUser', 'AuthController@editUser')->name('admin.auth.editUser');

        });

    });
});
