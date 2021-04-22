<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/16
 * Time: 15:58
 */

namespace App\Helpers\WeChatWork;

use \Cache;

class SendMessage
{

    private static $sendMessageUrl = "";

    public static function sendWchatMessage($content,$userId = "@all")
    {
        $param = [
            "touser"                    => $userId,
            "toparty"                   => "",
            "totag"                     => "",
            "msgtype"                   => "text",
            "agentid"                   => Base::getAgentid(),
            "text"          => [
                "content" => $content
                ],
            "safe"                      =>0,
            "enable_id_trans"           => 0,
            "enable_duplicate_check"    => 0,
            "duplicate_check_interval"  => 1800
        ];

        $access_token = Base::getAccessToken();

        if(!empty($access_token['errcode']))
        {
            return false;
        }

        $wechatapi = Base::$root_url.'cgi-bin/message/send?access_token='.$access_token['access_token'];

        $result = CurlRequest::curlData($wechatapi,json_encode($param),'POST');
        return $result;
    }


}
