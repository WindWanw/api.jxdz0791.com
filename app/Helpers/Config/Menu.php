<?php
            namespace App\Helpers\Config;

            class Menu{

                public function config(){

                    return
            [['path'=>'home','name'=>'home','component'=>'route.home','meta'=>['parent'=>'','name'=>'工作台','iconfont'=>'iconfonticonshouye1-copy','needLogin'=>'true',],'children'=>[]],['path'=>'userManage','name'=>'userManage','component'=>'route.userManage','meta'=>['parent'=>'','name'=>'人员管理','iconfont'=>'iconfonticonjiaoseguanli','needLogin'=>'true',],'children'=>[['path'=>'userList','name'=>'userList','component'=>'route.userList','meta'=>['parent'=>'人员管理','name'=>'人员列表','iconfont'=>'iconfonticonyonghu2','needLogin'=>'true',],'children'=>[]],]],['path'=>'customManage','name'=>'customManage','component'=>'route.customManage','meta'=>['parent'=>'','name'=>'客户管理','iconfont'=>'iconfonticongonggongfuwuqingdan','needLogin'=>'true',],'children'=>[['path'=>'custom','name'=>'custom','component'=>'route.custom','meta'=>['parent'=>'客户管理','name'=>'全部客户','iconfont'=>'iconfonticonkehu2','needLogin'=>'true',],'children'=>[]],['path'=>'subCustom','name'=>'subCustom','component'=>'route.subCustom','meta'=>['parent'=>'客户管理','name'=>'下属客户','iconfont'=>'iconfonticonxiashudanweiguanli','needLogin'=>'true',],'children'=>[]],['path'=>'publicCustom','name'=>'publicCustom','component'=>'route.publicCustom','meta'=>['parent'=>'客户管理','name'=>'公共客户','iconfont'=>'iconfonticongonggongpeizhi','needLogin'=>'true',],'children'=>[]],['path'=>'myCustom','name'=>'myCustom','component'=>'route.myCustom','meta'=>['parent'=>'客户管理','name'=>'我的客户','iconfont'=>'iconfonticonkehutuijian','needLogin'=>'true',],'children'=>[]],]],['path'=>'systemManage','name'=>'systemManage','component'=>'route.systemManage','redirect'=>'authManage','meta'=>['parent'=>'','name'=>'系统管理','iconfont'=>'iconfonticonxitongguanli51','needLogin'=>'true',],'children'=>[['path'=>'areaManage','name'=>'areaManage','component'=>'route.areaManage','meta'=>['parent'=>'系统管理','name'=>'组织架构','iconfont'=>'iconfonticonzuzhi1','needLogin'=>'true',],'children'=>[]],['path'=>'qualiManage','name'=>'qualiManage','component'=>'route.qualiManage','meta'=>['parent'=>'系统管理','name'=>'资质管理','iconfont'=>'iconfonticonzizhi1','needLogin'=>'true',],'children'=>[]],['path'=>'authManage','name'=>'authManage','component'=>'route.authManage','redirect'=>'adminRole','meta'=>['parent'=>'系统管理','name'=>'权限管理','iconfont'=>'iconfonticonquanxianguanli1','needLogin'=>'true',],'children'=>[['path'=>'adminRole','name'=>'adminRole','component'=>'route.adminRole','meta'=>['parent'=>'权限管理','name'=>'角色管理','iconfont'=>'iconfonticonjiaoseguanli','needLogin'=>'true',],],['path'=>'adminMenu','name'=>'adminMenu','component'=>'route.adminMenu','meta'=>['parent'=>'权限管理','name'=>'菜单设置','iconfont'=>'iconfonticoncaidanguanliai-02','needLogin'=>'true',],],]],]],];}
                }