<?php

use App\Helpers\Extra\Token;
use Facades\App\Helpers\Extra\Utils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        self::_init();

    }

    //这里面调用各种填充方法
    public static function _init()
    {

        self::_addAdminUserInfo();

        self::_addArea();
    }

    /**
     * 数据表别称
     *
     * @var array
     */
    public static $table = [
        'user' => 'admin_users',
        'token' => 'admin_user_tokens',
        'role' => 'admin_roles',
        'menu' => 'admin_menus',
        'user_role' => 'admin_user_roles',
        'role_menu' => 'admin_role_menus',
        'org' => 'admin_orgs',
    ];

    /**
     * 获取 数据表名
     *
     * @param [type] $alias  别名
     * @return void
     */
    public static function T($alias)
    {
        return self::$table[$alias];
    }

    /**
     * 考虑到账号的唯一性，方便测试，这里检测数据表中是否存在username为admin的，如果存在，则修改该账号
     *
     * @param [type] $username
     * @return void
     */
    public static function setUsername($username)
    {

        $query = DB::table(self::T('user'));

        if ($user = $query->where('username', $username)->first()) {

            $string = 'admin' . rand(0, 4);

            if ($query->where('id', $user->id)->update(['username' => $string])) {
                self::setUsername($string);
            }

        }

        return true;
    }

    /**
     * 自动填充超级管理员信息
     * 考虑到使用工厂模式不知咋创建临时表
     * 可以使用查询构造器或者
     *
     * @return void
     */
    public static function _addAdminUserInfo()
    {

        DB::beginTransaction();

        if (self::setUsername('admin')) {

            //1.创建用户信息
            if (!$uid = self::_addUser()) {
                DB::rollBack();
            }

            //2.创建api
            if (!self::_addToken($uid)) {
                DB::rollBack();
            }

            //3.创建角色
            if (!$rid = self::_addRole()) {
                DB::rollBack();
            }

            //4.创建用户角色关联表
            if (!self::_addUserRole($uid, $rid)) {
                DB::rollBack();
            }

            //5.创建关键菜单（菜单管理）
            if (!$mid = self::_addMenu()) {
                DB::rollBack();
            }

            //6.添加权限路由
            // if (!$aid = self::_addAction($mid[1], $mid[2], $mid[3])) {
            //     DB::rollBack();
            // }

            //7.创建角色菜单关联表
            if (!self::_addRoleMenu($rid, $mid)) {
                DB::rollBack();
            }

            //8.创建角色操作关联表（角色拥有路由权限）
            // if (!self::_addRoleAction($rid, $aid)) {
            //     DB::rollBack();
            // }
        }

        DB::commit();

    }


    /**
     * 地区
     *
     * @return void
     */
    public static function _addArea()
    {

        $data = [
            "name" => "总部",
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        return DB::table(self::T('org'))->insertGetId($data);

    }

    /**
     *创建用户信息
     *
     * @return void
     */
    public static function _addUser()
    {

        $data = [
            "username" => "admin",
            "nickname" => "admin",
            'phone' => '188' . rand(10000000, 99999999),
            'password' => \password_hash('123456', PASSWORD_DEFAULT),
            'reg_ip' => Utils::ipAddress(),
            'reg_time' => time(),
            'last_ip' => Utils::ipAddress(),
            'last_time' => time(),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];
        return DB::table(self::T('user'))->insertGetId($data);

    }

    /**
     * 创建token
     *
     * @param [type] $uid
     * @return void
     */
    public static function _addToken($uid)
    {
        $data = [
            'user_id' => $uid,
            'access_token' => Token::generateToken(),
            'expired_time' => date('Y-m-d H:i:s', strtotime('+ 7 days')),
            'created_ip' => Utils::ipAddress(),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        return DB::table(self::T('token'))->insert($data);
    }

    /**
     * 创建角色
     *
     * @return void
     */
    public static function _addRole()
    {
        $data = [
            'name' => '超级管理员',
            'describe' => '超级管理员，管理后台所有功能',
            'create_id' => 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        return DB::table(self::T('role'))->insertGetId($data);
    }

    /**
     * 创建 用户角色关联表
     *
     * @param [type] $uid
     * @param [type] $rid
     * @return void
     */
    public static function _addUserRole($uid, $rid)
    {

        return DB::table(self::T('user_role'))->insert(['user_id' => $uid, 'role_id' => $rid]);
    }

    /**
     * 自动填充菜单，这里默认填充的是后台添加菜单，剩余的菜单将由管理员手动按照需求添加
     * 一级菜单为权限管理
     * 二级菜单为菜单管理
     *
     * @return void
     */
    public static function _addMenu()
    {

        $menu = DB::table(self::T('menu'));

        $data_one = [
            'pid' => 0,
            'title' => '系统管理',
            'code' => 'systemManage',
            'status' => 1,
            'level' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $pid1 = $menu->insertGetId($data_one);

        $data_one1 = [
            'pid' => $pid1,
            'title' => '权限管理',
            'code' => 'authManage',
            'status' => 1,
            'level' => 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $pid2 = $menu->insertGetId($data_one1);

        $data_two = [
            'pid' => $pid2,
            'title' => '菜单列表',
            'code' => 'adminMenu',
            'status' => 1,
            'level' => 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $mid1 = $menu->insertGetId($data_two);

        $data_three = [
            'pid' => $pid2,
            'title' => '角色管理',
            'code' => 'adminRole',
            'status' => 1,
            'level' => 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $mid2 = $menu->insertGetId($data_three);

        $data_four = [
            'pid' => $pid2,
            'title' => '用户列表',
            'code' => 'adminUser',
            'status' => 1,
            'level' => 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $mid3 = $menu->insertGetId($data_four);

        return [$pid1, $pid2, $mid1, $mid2, $mid3];

    }

    /**
     * 为菜单管理添加权限路由
     *
     * @return void
     */
    public static function _addAction($mid1, $mid2, $mid3)
    {

        $action = DB::table(self::T('action'));

        //菜单管理主要的权限路由
        $data_one = [
            [
                'title' => '菜单列表',
                'router' => 'admin.authority.get.menu.list',
            ],
            [
                'title' => '添加菜单信息',
                'router' => 'admin.authority.add.menu.info',
            ],
            [
                'title' => '修改菜单信息',
                'router' => 'admin.authority.edit.menu.info',
            ],
        ];

        $data_two = [
            [
                'title' => '角色列表',
                'router' => 'admin.authority.get.role.list',
            ],
            [
                'title' => '添加角色',
                'router' => 'admin.authority.add.role',
            ],
            [
                'title' => '修改角色',
                'router' => 'admin.authority.edit.role',
            ],
            [
                'title' => '启用/禁用角色',
                'router' => 'admin.authority.set.role.status',
            ],
        ];

        $data_three = [
            [
                'title' => '用户列表',
                'router' => 'admin.authority.get.admin.user.list',
            ],
            [
                'title' => '添加用户',
                'router' => 'admin.authority.add.user.info',
            ],
            [
                'title' => '修改用户',
                'router' => 'admin.authority.edit.user.info',
            ],
            [
                'title' => '解锁/锁定用户',
                'router' => 'admin.authority.block.user',
            ],
        ];

        $other1 = [
            'menu_id' => $mid1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $other2 = [
            'menu_id' => $mid2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $other3 = [
            'menu_id' => $mid3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];

        $aids1 = [];
        $aids2 = [];
        $aids3 = [];

        foreach ($data_one as $key => $value) {
            $info = array_merge($value, $other1);

            $aids1[] = $action->insertGetId($info);
        }

        foreach ($data_two as $key => $value) {
            $info = array_merge($value, $other2);

            $aids2[] = $action->insertGetId($info);
        }

        foreach ($data_three as $key => $value) {
            $info = array_merge($value, $other3);

            $aids3[] = $action->insertGetId($info);
        }

        return array_merge($aids1, $aids2, $aids3);

    }

    /**
     * 创建角色菜单关联表
     *
     * @param [type] $rid
     * @param [type] $mid
     * @return void
     */
    public static function _addRoleMenu($rid, $mid)
    {

        $data = [];

        foreach ($mid as $key => $value) {

            $data[$key] = [
                'role_id' => $rid,
                'menu_id' => $value,
            ];
        }

        return DB::table(self::T('role_menu'))->insert($data);

    }

    /**
     * 创建角色操作权限
     *
     * @param [type] $rid
     * @param [type] $aid
     * @return void
     */
    public static function _addRoleAction($rid, $aid)
    {

        $data = [];

        foreach ($aid as $key => $value) {

            $data[$key] = [
                'role_id' => $rid,
                'action_id' => $value,
            ];
        }

        return DB::table(self::T('role_action'))->insert($data);

    }
}
