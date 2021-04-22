<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/20
 * Time: 14:40
 */

namespace App\Helpers\Logger;


use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;
use Monolog\Processor\WebProcessor;

class Blogger
{
    private static $streamLogger;
    private static $handler = "mylog";
    public static function getStream($handler = '')
    {
        $handler = empty($handler) ? self::$handler:$handler;
        if(!self::$streamLogger instanceof MonologLogger)
        {
            self::$streamLogger = new MonologLogger($handler);
            self::$streamLogger->pushHandler(self::getStreamHandler());
            //self::$streamLogger->pushProcessor(new WebProcessor());
        }
        return self::$streamLogger;
    }

    private static function getStreamHandler()
    {
        $logpath = storage_path()."/logs/".self::$handler."-".date("Y-m-d").'.log';
        return  new StreamHandler($logpath,MonologLogger::INFO,true,0777);

    }
}
