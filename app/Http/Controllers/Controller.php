<?php

namespace App\Http\Controllers;

use App\Helpers\Config\ConfigCustomer;
use App\Helpers\Response\ResponseFactory as R;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use \App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get the user ID when login to auth
     *
     * @return UserId
     * */
    public function getUserId()
    {

        $uid = 1;

        try {
            $app = App::make('App\Helpers\Instance\Token');

            $uid = intval($app->userId);
        } catch (Exception $e) {
        }

        return $uid;
    }

    /**
     * 成功提示
     *
     * @param [type] $message
     * @return void
     */
    public function success($message)
    {
        return R::success($message);
    }

    /**
     * 失败提示
     *
     * @param [type] $message
     * @return void
     */
    public function error($message)
    {
        return R::error($message);
    }

    /**
     * 返回列表
     *
     * @param [type] $data
     * @return void
     */
    public function ok($data)
    {
        return R::ok($data);
    }

    /**
     * 获取客户管理的配置数据
     *
     * @param string $data
     * @return void
     */
    public function configCustomer($data)
    {
        //如果不存在字段，则将配置数据全部输出
        if (!isset($data)) {

            //获取配置类中所有的方法名
            $data = get_class_methods(ConfigCustomer::class);
        }

        $config = new ConfigCustomer();

        $list = [];

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $list[$value] = $config->$value();
            }

        } else {
            $list[$data] = $config->$data();
        }

        return $list;
    }

    /**
     * 获取缓存
     *
     * @param [type] $key   缓存名
     * @return void
     */
    public function getCache($key)
    {
        return Cache::get($key);
    }

    /**
     * 判断是否存在缓存
     *
     * @param [type] $key
     * @return boolean
     */
    public function hasCache($key)
    {
        return Cache::has($key);
    }

    /**
     * 设置缓存
     *
     * @param [type] $key
     * @param [type] $value
     * @param string $time
     * @return void
     */
    public function setCache($key, $value, $time = "")
    {
        return $time ? Cache::put($key, $value, $time) : Cache::put($key, $value);
    }

    /**
     * 获取element ui 中el-cascader传过来的多选数据，区分出来
     *
     * @param [type] $data
     * @return void
     */
    public function getMultiSelectValue($data)
    {

        $p = []; //父级id

        $c = []; //子级id

        foreach ($data as $key => $value) {

            if (\is_array($value)) {
                $v = $value;
            } else {
                $v = explode(",", preg_replace("/^\[|\]$/", "", $value));
            }

            $count = count($v);

            if ($count == 1) {
                $p[] = $v[0];
            } else if ($count == 2) {
                $c[] = $v[1];
            }
        }

        return [array_unique($p), array_unique($c)];
    }

}
