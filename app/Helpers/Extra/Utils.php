<?php

namespace App\Helpers\Extra;

/**
 * 公共方法
 */
class Utils
{

    /*
     * 获取IP地址
     */
    public function ipAddress($type = 0)
    {
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (!empty($_SERVER["REMOTE_ADDR"])) {
            $cip = $_SERVER["REMOTE_ADDR"];
        } else {
            $cip = "127.0.0.1";
        }
        return $cip;
    }

    /**
     * 获取时长，只显示小时，超过24小时累加
     *
     * @param [type] $time
     * @return void
     */
    public function getDuration($time)
    {
        date_default_timezone_set("UTC");

        $_hour = 60 * 60;

        if ($time < $_hour) {
            return date("H:i:s", $time);

        } else {

            $hours = floor($time / $_hour);//小时

            $_time = $time - $hours * $_hour;//几分几秒

            return $hours . ":" . date("i:s", $_time);

        }

    }
}
