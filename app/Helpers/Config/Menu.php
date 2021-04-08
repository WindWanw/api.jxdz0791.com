<?php
            namespace App\Helpers\Config;

            class Menu{

                public function config(){

                    return
            [['path'=>'home','name'=>'home','component'=>'route.home','meta'=>['parent'=>'','name'=>'首页','iconfont'=>'iconfonticonhome_icon','needLogin'=>'true',],'children'=>[]],['path'=>'announcement','name'=>'announcement','component'=>'route.announcement','meta'=>['parent'=>'','name'=>'公告管理','iconfont'=>'iconfonticonzhaobiaogonggao','needLogin'=>'true',],'children'=>[]],['path'=>'navColumn','name'=>'navColumn','component'=>'route.navColumn','meta'=>['parent'=>'','name'=>'导航管理','iconfont'=>'iconfonticondaohanglantubiao_shebei','needLogin'=>'true',],'children'=>[]],['path'=>'userManage','name'=>'userManage','component'=>'route.userManage','redirect'=>'userList','meta'=>['parent'=>'','name'=>'用户管理','iconfont'=>'iconfonticonquanxianshezhi','needLogin'=>'true',],'children'=>[['path'=>'userList','name'=>'userList','component'=>'route.userList','meta'=>['parent'=>'用户管理','name'=>'用户列表','iconfont'=>'iconfonticonyonhu','needLogin'=>'true',],],]],['path'=>'officialManage','name'=>'officialManage','component'=>'route.officialManage','redirect'=>'offers','meta'=>['parent'=>'','name'=>'官网管理','iconfont'=>'iconfonticonguanwang1','needLogin'=>'true',],'children'=>[['path'=>'offers','name'=>'offers','component'=>'route.offers','meta'=>['parent'=>'','name'=>'资质估算','iconfont'=>'iconfonticontubiao-baojia','needLogin'=>'true',],],['path'=>'contacts','name'=>'contacts','component'=>'route.contacts','meta'=>['parent'=>'','name'=>'联系我们','iconfont'=>'iconfonticonlianxiwomen','needLogin'=>'true',],],]],['path'=>'newsManage','name'=>'newsManage','component'=>'route.newsManage','redirect'=>'newsColumn','meta'=>['parent'=>'','name'=>'新闻管理','iconfont'=>'iconfonticonquanbuxinwen','needLogin'=>'true',],'children'=>[['path'=>'newsColumn','name'=>'newsColumn','component'=>'route.newsColumn','meta'=>['parent'=>'','name'=>'新闻栏目','iconfont'=>'iconfonticonlanmu','needLogin'=>'true',],],['path'=>'newsList','name'=>'newsList','component'=>'route.newsList','meta'=>['parent'=>'','name'=>'新闻列表','iconfont'=>'iconfonticonxinwen','needLogin'=>'true',],],]],['path'=>'qualificationManage','name'=>'qualificationManage','component'=>'route.qualificationManage','redirect'=>'qualificationColumn','meta'=>['parent'=>'','name'=>'资质管理','iconfont'=>'iconfonticonzizhi1','needLogin'=>'true',],'children'=>[['path'=>'qualificationColumn','name'=>'qualificationColumn','component'=>'route.qualificationColumn','meta'=>['parent'=>'','name'=>'资质栏目','iconfont'=>'iconfonticonzu164','needLogin'=>'true',],],['path'=>'qualificationList','name'=>'qualificationList','component'=>'route.qualificationList','meta'=>['parent'=>'','name'=>'资质列表','iconfont'=>'iconfonticonzizhizhengshu1','needLogin'=>'true',],],]],['path'=>'videoManage','name'=>'videoManage','component'=>'route.videoManage','redirect'=>'videoColumn','meta'=>['parent'=>'','name'=>'视频管理','iconfont'=>'iconfonticonvideo','needLogin'=>'true',],'children'=>[['path'=>'videoColumn','name'=>'videoColumn','component'=>'route.videoColumn','meta'=>['parent'=>'','name'=>'视频栏目','iconfont'=>'iconfonticon01','needLogin'=>'true',],],['path'=>'videoList','name'=>'videoList','component'=>'route.videoList','meta'=>['parent'=>'','name'=>'视频列表','iconfont'=>'iconfonticonshipin','needLogin'=>'true',],],['path'=>'videoDZList','name'=>'videoDZList','component'=>'route.videoDZList','meta'=>['parent'=>'','name'=>'内部视频','iconfont'=>'iconfonticonshipin','needLogin'=>'true',],],]],['path'=>'systemManage','name'=>'systemManage','component'=>'route.systemManage','redirect'=>'domainArea','meta'=>['parent'=>'','name'=>'系统管理','iconfont'=>'iconfonticontableprocessdeployment','needLogin'=>'true',],'children'=>[['path'=>'domainArea','name'=>'domainArea','component'=>'route.domainArea','meta'=>['parent'=>'系统管理','name'=>'地区设置','iconfont'=>'iconfonticondaohang','needLogin'=>'true',],'children'=>[],],['path'=>'whiteList','name'=>'whiteList','component'=>'route.whiteList','meta'=>['parent'=>'系统管理','name'=>'白名单','iconfont'=>'iconfonticondaohanglanmoshi01','needLogin'=>'true',],'children'=>[],],['path'=>'authManage','name'=>'authManage','component'=>'route.authManage','redirect'=>'adminUser','meta'=>['parent'=>'系统管理','name'=>'权限管理','iconfont'=>'iconfonticonquanxianshezhi','needLogin'=>'true',],'children'=>[['path'=>'adminUser','name'=>'adminUser','component'=>'route.adminUser','meta'=>['parent'=>'权限管理','name'=>'后台用户','iconfont'=>'iconfonticonyonhu','needLogin'=>'true',],],['path'=>'adminRole','name'=>'adminRole','component'=>'route.adminRole','meta'=>['parent'=>'权限管理','name'=>'角色管理','iconfont'=>'iconfonticonquanxianshenyue','needLogin'=>'true',],],['path'=>'adminMenu','name'=>'adminMenu','component'=>'route.adminMenu','meta'=>['parent'=>'权限管理','name'=>'菜单设置','iconfont'=>'iconfonticoncaidan2','needLogin'=>'true',],],]],]],];}
                }