<?php

namespace App\Http\Requests\Validate;

//用于所有带有参数的 进行校验
use Illuminate\Support\Facades\Validator;
use \Route;

class Validation
{

    private $processValidator;

    public function __construct()
    {

        $this->processValidator = Process::processValidator();
    }

    /*
     *  验证器的名称 = 路由设定的名称
     */
    private function getValidationName()
    {
        return Route::currentRouteName();
    }

    public function process($request)
    {
        $routename = $this->getValidationName();
        //查看是否设置了
    
        if (isset($this->processValidator[$routename])) {

            $str = $this->processValidator[$routename];

            //把类方法解析出来
            $str = explode('.', $str);

            $classname = 'App\\Http\\Requests\\' . $str[0];
      
            //这个类没有定义，也不做任何校验了
            if (class_exists($classname) == false) {
                return true;
            }
            $r = new $classname();

            $error = Validator::make($request->all(), $r->{$str[1]}(), $r->messages());

            if ($error->errors()->isEmpty() == false) {
                return ['error' => self::_validator($error->errors()->toArray())];
            }
        }

        return true;
    }


    private static function _validator(array $error)
    {
        foreach ($error as $k => $v) {
            return $v[0];
        }
    }
}
