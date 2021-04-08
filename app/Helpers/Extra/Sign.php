<?php
namespace App\Helpers\Extra;

class Sign
{
    const DEZHI_SHA1 = 'JuFynxr1O8Jp74y9dgJ8tQJ850hQ3nD0';

    public static function paraFilter($parameter)
    {
        $para = array();
        foreach ($parameter as $key => $val) {
            if ($key != "sign" && $val != "") {
                $para[$key] = $val;
            }
        }
        return $para;
    }

    public static function getSign($parameter)
    {
        $_parameter = self::paraFilter($parameter);
        ksort($_parameter);
        reset($_parameter);
        $parame = "";
        /**
         * php 7.2 废弃 each
         *
         * while (list ($key, $val) = each($_parameter))
        {
        $parame .= $key . "=" . $val . "&";
        }
         */
        foreach ($_parameter as $key => $val) {
            $parame .= $key . "=" . $val . "&";
        }
        $parame = substr($parame, 0, strlen($parame) - 1);
        $parame = $parame . self::DEZHI_SHA1 . microtime(true);
        $mysign = md5($parame);
        return $mysign;
    }

    public static function getSha1Sign($parameter)
    {
        return sha1($parameter);
    }

    public static function isSha1Sign($parameter, $sign)
    {
        $sha1Sign = self::getSha1Sign($parameter);
        if ($sha1Sign == $sign) {
            return ['result' => 'success'];
        } else {
            return [
                'result' => 'error',
                'sha1Sign' => $sha1Sign,
            ];
        }
    }
}
