<?php

namespace App\Helpers\Extra;

use App\Helpers\Response\Enum;
use Illuminate\Support\Facades\Storage;

class Upload
{

    //上传文件后缀
    private $file_suffix = ['jpg', 'jpeg', 'png', 'gif'];
    //上传文件类型
    private $type = "file";
    //上传文件大小限制
    private $size = 20 * 1024 * 1024;
    //写入文件的前缀
    private $file_prepend = "<?php
            namespace App\Helpers\Config;

            class Menu{

                public function config(){

                    return
            ";

    //写入文件的后缀
    private $file_append = ";}
                }";

    //写入文件的地址
    private $bath = "app\\Helpers\\Config\\Menu.php";

    public function __construct($_config = [])
    {
        $this->file_suffix = $this->_set($_config, "file_suffix");
        $this->type = $this->_set($_config, "type");
        $this->size = $this->_set($_config, "size");
        $this->file_prepend = $this->_set($_config, "file_prepend");
        $this->file_append = $this->_set($_config, "file_append");
        $this->bath = $this->_set($_config, "bath");
    }

    private function _set($_config, $key)
    {
        return isset($_config[$key]) ? $_config[$key] : $this->$key;
    }

    /**
     * 上传文件
     *
     * @param Request $r        上传的数据信息
     * @return void
     */
    public function uploadFile($r)
    {

        switch ($r->type) {

            case 'file':
                return $this->_uploadFile($r);
                break;
            case 'image':
                return $this->_uploadImage($r);
                break;
            default:
                return $this->_uploadImage($r);
        }
    }

    /**
     * 上传图片
     *
     * @param Request $r        上传的数据信息
     * @return void
     */
    public function _uploadImage($r)
    {

        //接收上传的图片
        $file = $r->file('file');
        //获取图片后缀名
        $suffix = $file->getClientOriginalExtension();

        //验证文件是否满足上传规则
        // if (!in_array($suffix, $this->file_suffix)) {
        //     return ["message" => '请上传正确的图片格式', "error" => Enum::IMAGE_TYPE_ERROR];
        // }
        if ($file->getSize() > $this->size) {
            return ["message" => '文件大小不能超过20MB', "error" => Enum::IMAGE_SIZE_ERROR];
        }

        $ext = $file->getClientOriginalExtension(); // 扩展名

        $realPath = $file->getRealPath(); //临时文件的绝对路径
        // 上传文件
        $filename = 'crm/' . date('Ym') . '/' . time() . '-' . uniqid() . '.' . $ext;

        //这里的uploads是配置文件的名称
        $bool = Storage::disk('public')->put($filename, file_get_contents($realPath));

        if ($bool != true) {
            //文件上传失败
            return ["message" => "上传失败", "error" => Enum::FAIL];
        }

        return ["data" => Storage::disk('public')->url($filename)];

    }

    public function _uploadFile($r)
    {

        $file = $r->file('file');

        $string = \file_get_contents($file);

        $data = ""; //成功后返回的数据
        //如果是js文件
        if (isset($r->isJs) && $r->isJs) {

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

            $string = $this->file_prepend . $string . $this->file_append;

            $data = "App\\Helpers\\Config\\Menu";

        }

        $path = \base_path() . "\\" . $this->bath;

        try {

            \file_put_contents($path, $string);

            return ["data" => $data];

        } catch (\Exception $e) {

            throw new \Exception($e->getMessage());

            return ["message" => "写入失败", "error" => Enum::FAIL];

        }

    }

    private function replace(string $string, array $_config)
    {

        foreach ($_config as $key => $value) {
            $string = \str_replace($key, $value, $string);
        }

        return $string;
    }

}
