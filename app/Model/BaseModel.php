<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /**
     * 获取时间格式
     *
     * @param [type] $time
     * @param string $format
     * @return void
     */
    public function getDate($times, $format = "Y-m-d H:i:s")
    {

        if (\is_array($times)) {

            foreach ($times as $key => $value) {
                $data[] = $this->_getDate($format, $value);
            }

            return $data;
        }

        return $this->_getDate($format, $times);

    }

    private function _getDate($format, $time)
    {
        return date($format, $time);

    }

    /**
     * 设置文件地址
     *
     * @param array $file
     * @param boolean $isJson   是否返回json格式
     * @return void
     */
    public function setFileUrl(array $file, $isJson = false)
    {

        if (!$file) {
            return "";
        }

        $data = \array_map(function ($f) {

            $host = env("APP_URL");

            return \str_replace($host, "", $f);
        }, $file);

        return $isJson ? \json_encode($data) : $data;

    }

    /**
     * 获取文件地址
     *
     * 返回数组格式
     * @param [type] $file
     * @return void
     */
    public function getFileUrl($file)
    {

        $_file = \json_decode($file);

        if (empty($_file)) {
            return [];
        }

        $data = \array_map(function ($f) {

            $host = env("APP_URL");

            //如果存在该域名，返回原数据
            if ((\strpos($f, chr($host)) !== false)) {
                return $f;
            }

            return $host . $f;

        }, $_file);

        return $data;

    }
}
