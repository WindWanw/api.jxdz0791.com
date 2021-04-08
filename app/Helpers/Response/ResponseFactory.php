<?php

namespace App\Helpers\Response;

use App\Helpers\Response\Enum;

class ResponseFactory
{

    private static function toJson($data, $code)
    {
        return response()->json(["code" => $code, "data" => $data, "times" => date("yy-m-d H:i:s", time())]);
    }

    public static function success($message, $code = Enum::OK)
    {

        $m = \is_array($message) ? $message : ["message" => $message];

        return self::toJson($m, $code);
    }

    public static function error($message, $code = Enum::FAIL)
    {
        return self::toJson(["message" => $message], $code);
    }

    public static function ok($data, $code = Enum::OK)
    {
        return self::toJson(["list" => $data], $code);
    }
}
