<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facades\App\Service\Admin\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\AdminRole;

class TestController extends Controller
{
    //

    public function index(Request $r)
    {

        // Cache::put('username_file','wanwei',1);

        echo Cache::get('username_file');

        // date_default_timezone_set("UTC");

        // print_r(Utils::getDuration($r->time));

        // return R::ok($this->getFile());

        // return R::ok(AuthService::_getRoleMenuId([4,5,6,12]));

        // $list = AdminRoleMenu::where("role_id", $r->id)->get();

        // $list = $this->getArrayValue($list, "menu_id");

        // return R::ok($list);

        // $data = $r->all();

        // $role = new AdminRole;
        // $menu = new AdminRole;
        // $role_menu = new AdminRoleMenu;

        // $ok = $this->action(function ($role, $role_menu, $data) {

        //     $role->name = $data['name'];
        //     $role->describe = $data['describe'];
        //     $role->create_id = 1;

        //     if ($role->save() === false) {

        //         return false;
        //     }

        //     if (isset($data['menu_id'])) {

        //         foreach ($data['menu_id'] as $value) {
        //             $role_menu_data = [
        //                 "role_id" => $role->id,
        //                 "menu_id" => $value,
        //             ];

        //             $flag[] = !$role_menu->create($role_menu_data);

        //         }

        //         if(in_array(true,$flag)){
        //             return false;
        //         }

        //     }

        //     return true;

        // }, $role, $role_menu, $data);

        // if ($ok) {
        //     return R::success("添加成功");
        // }

        // return R::error("添加失败");

        // return R::ok($this->test());

    }

    public function test()
    {

        $classname = "App\\Helpers\\Config\\Menu";
        $menu = (new $classname())->config();

        return AuthService::saveAllMenu($menu);

        return 1;

        // print_r($menu);
    }

    public function action($callback, ...$data)
    {
        DB::beginTransaction();

        try {

            $ok = call_user_func_array($callback, $data);

            if ($ok) {

                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());

        }

        DB::rollback();

        return false;

    }

    public function getArrayValue($data, $key)
    {

        $list = [];

        foreach ($data as $value) {
            $list[] = $value->$key;
        }

        return $list;
    }

    public function getFile()
    {

        $string = "import route from './route-lazy.js'
const asyRoute = [{
        path: '/home',
        name: 'home',
        component: route.home,
        meta: {
            parent: '',
            name: '首页',
            iconfont: 'iconfont iconhome_icon',
            needLogin: true,
        },
        children: []
    },
    {
        path: '/newsManage',
        name: 'newsManage',
        component: route.newsManage,
        redirect: '/newsColumn',
        meta: {
            parent: '',
            name: '新闻管理',
            iconfont: 'iconfont iconquanbuxinwen',
            needLogin: true,
        },
        children: [{
            path: '/newsColumn',
            name: 'newsColumn',
            component: route.newsColumn,
            meta: {
                parent: '',
                name: '新闻栏目',
                iconfont: 'iconfont iconlanmu',
                needLogin: true,
            },
        }, {
            path: '/newsList',
            name: 'newsList',
            component: route.newsList,
            meta: {
                parent: '',
                name: '新闻列表',
                iconfont: 'iconfont iconxinwen',
                needLogin: true,
            },
        }, ]
    },
    {
        path: '/qualificationManage',
        name: 'qualificationManage',
        component: route.qualificationManage,
        redirect: '/qualificationColumn',
        meta: {
            parent: '',
            name: '资质管理',
            iconfont: 'iconfont iconzizhi1',
            needLogin: true,
        },
        children: [{
            path: '/qualificationColumn',
            name: 'qualificationColumn',
            component: route.qualificationColumn,
            meta: {
                parent: '',
                name: '资质栏目',
                iconfont: 'iconfont iconzu164',
                needLogin: true,
            },
        }, {
            path: '/qualificationList',
            name: 'qualificationList',
            component: route.qualificationList,
            meta: {
                parent: '',
                name: '资质列表',
                iconfont: 'iconfont iconzizhizhengshu1',
                needLogin: true,
            },
        }, ]
    },
    {
        path: '/systemManage',
        name: 'systemManage',
        component: route.systemManage,
        redirect: '/adminUser',
        meta: {
            parent: '',
            name: '系统管理',
            iconfont: 'iconfont icontableprocessdeployment',
            needLogin: true,
        },
        children: [{
                path: '/authManage',
                name: 'authManage',
                component: route.authManage,
                redirect: '/adminUser',
                meta: {
                    parent: '系统管理',
                    name: '权限管理',
                    iconfont: 'iconfont iconquanxianshezhi',
                    needLogin: true,
                },
                children: [{
                        path: '/adminUser',
                        name: 'adminUser',
                        component: route.adminUser,
                        meta: {
                            parent: '权限管理',
                            name: '后台用户',
                            iconfont: 'iconfont iconyonhu',
                            needLogin: true,
                        },
                    },
                    {
                        path: '/adminRole',
                        name: 'adminRole',
                        component: route.adminRole,
                        meta: {
                            parent: '权限管理',
                            name: '角色管理',
                            iconfont: 'iconfont iconquanxianshenyue',
                            needLogin: true,
                        },
                    },
                    {
                        path: '/adminMenu',
                        name: 'adminMenu',
                        component: route.adminMenu,
                        meta: {
                            parent: '权限管理',
                            name: '菜单设置',
                            iconfont: 'iconfont iconcaidan2',
                            needLogin: true,
                        },
                    },
                ]
            },

        ]
    },

];


export default asyRoute;";

        if (substr_count($string, "=") > 1) {
            return ["error" => "数据错误"];
        }

        //1.清除所有的空格以及换行符
        $string = preg_replace("/\s*|\/|\'/", "", $string);

        //2.清除第一个[之前的所有字符，]之后的所有字符
        $string = substr($string, strpos($string, "["), (\strrpos($string, "]") - strpos($string, "[") + 1));

        //3.替换

        $_config = [
            "{" => "[",
            "}" => "]",
            ":" => "=>",
            "[" => "['",
            "=>" => "'=>'",
            "," => "','",
            "'[" => "[",
            ",']" => ",]",
            "]'" => "]",
            "[']" => "[]",

        ];

        $string = $this->replace($string, $_config);

        $prefix = "<?php
            namespace App\Helpers\Config;

            class Menu{

                public function config(){

                    return
            ";

        $suffix = ";}
                }
                ";

        $str = $prefix . $string . $suffix;

        $path = \base_path() . "\\app\\Helpers\\Config\\Menu.php";

        \file_put_contents($path, $str);

        $classname = "App\\Helpers\\Config\\Menu";

        if (class_exists($classname)) {

            $m = new $classname();

            return $m->config();
        }

    }

    private function replace(string $string, array $_config)
    {

        foreach ($_config as $key => $value) {
            $string = \str_replace($key, $value, $string);
        }

        return $string;
    }

    public function x()
    {
        return [
            [
                'path' => 'home',
                'name' => 'home',
                'component' => 'route.home',
                'meta' => [
                    'parent' => '',
                    'name' => '首页',
                    'iconfont' => 'iconfonticonhome_icon',
                    'needLogin' => 'true',
                ],
                'children' => [],
            ],
        ];
    }

    public function home(Request $r)
    {

        // echo 1;
        // return R::ok(["name"=>"ww"]);

        print_r(AdminRole::value("name"));die;

        $data=[
            "name"=>"haha",
            "describe"=>""
        ];

        if(AdminRole::edit(["id"=>26],$data)){
            echo "修改成功";
        }

        echo "修改失败";

    }
}
