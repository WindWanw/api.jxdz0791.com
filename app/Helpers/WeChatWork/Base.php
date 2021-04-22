<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/16
 * Time: 16:27
 */

namespace App\Helpers\WeChatWork;

use \Cache;

class Base
{
    private static $corpid = "ww6f6d82f38a3e5acf";


    private static $agentid = "1000002";
    private static $corpsecret = "BQU_O6oJFvJrEqmHxJVCTwNbWUvBUY7qK3XMwr1yuoU";

    public static $root_url = "https://qyapi.weixin.qq.com/";

    public static function getAgentid()
    {
        return self::$agentid;
    }


    //获取access_token
    public static function getAccessToken() {

        $re = Cache::get("access_token");
        if(!empty($re))
        {
            return json_decode($re,true);
        }

        $wechatapi = 'cgi-bin/gettoken';
        $param = [
            'corpid'      => self::$corpid,
            'corpsecret'  => self::$corpsecret,
        ];
        $result = CurlRequest::curlData(self::$root_url . $wechatapi, $param);
        $re =  json_decode($result,true);
        //因为获取access_token 有次数限制，所以做下缓存
        Cache::put('access_token',json_encode($re),$re['expires_in']/60-10);

        return $re;

    }
}
