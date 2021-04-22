<?php

namespace App\Service;

use App\Helpers\Config\MenuActions;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use \App;

class Service
{

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
     * Get the role ID when login to auth
     *
     * @return RoleId
     * */
    public function getRoleId()
    {

        $role_id = 0;

        try {
            $app = App::make('App\Helpers\Instance\Token');

            $role_id = intval($app->roleId);
        } catch (Exception $e) {

        }

        return $role_id;
    }

    /**
     * 获取数组中最后一条数据
     *
     * 如果不是数组直接返回
     *
     * @param [type] $data
     * @return void
     */
    public function getArrayEndData($data)
    {

        return \is_array($data) ? end($data) : $data;
    }

    /**
     * 从数组中获取指定key的值
     *
     * @param $data
     * @param [type] $key
     * @return void
     */
    public function getArrayValue($data, $key)
    {

        if (empty($data)) {
            return [];
        }

        $list = [];

        foreach ($data as $value) {
            $list[] = $value->$key;
        }

        return $list;
    }

    /**
     * 封装数据库事务操作
     *
     * @param [type] $callback  匿名函数，主要用于数据库操作
     * @param [type] ...$data   传递的数据，包括实例化对象以及传入的数据etc.
     * @return void
     */
    public function action($callback, ...$data)
    {
        DB::beginTransaction();

        try {

            $ok = call_user_func_array($callback, $data);

            if ($ok) {

                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());

        }

        DB::rollback();

        return false;

    }

    /**
     * 检测字段唯一
     *
     * @param [type] $data      要检测的字段     ['field'=>'field]
     * @param [type] $model     数据表模型名称
     * @param [type] $id        数据表id
     * @return void
     */
    public function checkUnique($data, $model, $id = 0)
    {

        try {
            $classname = "App\\Model\\Admin\\" . $model;

            if (class_exists($classname)) {
                $object = new $classname(); //如果存在该模型，则实例化
            } else {
                $object = $this->$model(); //这是在子级中的一个方法，实例化了一个模型
            }

            //如果存在id，表示验证更新数据
            if ($id) {
                return (bool) $object->where($data)->where("id", "!=", $id)->count();

            } else {
                //验证插入数据
                return (bool) $object->where($data)->count();
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());

        }

    }

    /**
     * 如果数据为null，则转换成""
     *
     * @param [type] $data
     * @return void
     */
    public function _update($data)
    {

        foreach ($data as $key => $value) {

            if (\is_null($value)) {
                $data[$key] = "";
            }
        }

        return $data;
    }

    /**
     *获取无限极分类数据
     *
     * @param [type] $list
     * @param integer $pid
     * @return void
     */
    public function getInfinitePolarClassification($list, $pid = 0)
    {

        $data = [];

        if ($list) {
            foreach ($list as $key => $value) {
                if ($value["pid"] == $pid) {
                    $v = $value;
                    $v["disabled"] = (bool) !$v["status"];
                    $v["children"] = $this->getInfinitePolarClassification($list, $value["id"]);
                    $data[] = array_filter($v, function ($d) {
                        if (is_array($d) && empty($d)) {
                            return false;
                        } else {
                            return true;
                        }
                    });

                }

            }

        }

        return $data;

    }

    /**
     * 获取菜单中的操作配置数据
     *
     * @param [type] $value
     * @return void
     */
    public function getAction($value)
    {

        $list = MenuActions::getActions();

        $data = [];

        foreach ($list as $k => $v) {

            if ($v["value"] == $value) {
                $data = $v["actions"];
            }
        }

        return $data;
    }

    /**
     * 获取菜单配置的操作
     *
     * @return void
     */
    public function getConfigActionsValue()
    {

        $list = MenuActions::getActions();

        $data = [];

        foreach ($list as $key => $value) {
            $data[] = $value["value"];
        }

        return $data;
    }

    /**
     * 将多维数组中数组的值取出平铺为一维数组
     *
     * @param [type] $array
     * @return void
     */
    public function flatten($array)
    {
        return Arr::flatten($array);
    }

    /**
     * 将一个值插入到数组的开始位置
     *
     * @param [type] $array
     * @param [type] $value
     * @return void
     */
    public function prepend($array, $value)
    {
        return Arr::prepend($array, (int) $value);
    }

    /**
     * 获取跟进时间
     *
     * @param [type] $date
     * @return void
     */
    public function getFollowUpTime($date)
    {

        $time = \strtotime($date);

        $format = "Y-m-d";

        switch (date($format, $time)) {
            case date($format):
                return "今日跟进";
            case date($format, \strtotime("-1 day")):
                return "昨日跟进";
            case date($format, \strtotime("-2 day")):
                return "前日跟进";
            default:
                return date("Y/m/d", $time);
        }

    }

    public function getWarningTime($date)
    {

        if (!$date) {
            return "";
        }

        $time = \strtotime($date);

        $day_time = 24 * 60 * 60;

        if ($time > time()) {

            $day = ceil(($time - time()) / $day_time);

            switch (true) {
                case ($day <= 90):
                    $color = "#F56C6C";
                    break;
                case (($day > 90) && ($day <= 180)):
                    $color = "#E6A23C";
                    break;
                case ($day > 180):
                    $color = "#67C23A";
                    break;
            }

            $info = "{$day}天";

        } else {
            $day = floor((time() - $time) / $day_time);
            $color = "#F56C6C";
            $info = "已逾期{$day}天";

        }

        return ["color" => $color, "info" => $info];

    }

    /**
     * 从数组中获取值
     *
     * @param [type] $data
     * @param integer $key      键
     * @return void
     */
    public function getValueFromArray($data, $key = 0)
    {

        if (is_array($data) && isset($data[$key])) {

            return $data[$key];

        }

        return "";
    }

    /**
     * 将$data中数据批量赋值给$array
     *
     * @param array $array      二维数组
     * @param [type] $data
     * @return void
     */
    public function setBatchAssignData(array $array, $data)
    {

        return array_map(function ($d) use ($data) {

            return array_merge($d, $data);

        }, $array);

    }

    /**
     * 判断二维数组内部是否存在值
     *
     *
     * @param array $array
     * @return void
     */
    public function getNotEmptyData(array $array)
    {

        return array_filter(array_map(function ($a) {

            return array_filter($a);
        }, $array));
    }

    /**
     * 获取二维数组中最大/最小的值
     *
     * @param array $array      二维数组
     * @param string $key       要输出的key
     * @param boolean $flag     true最大，false最小
     * @return void
     */
    public function get2ArrayValueFromData(array $array, $key, $flag = true)
    {
        $data = array_column($array, $key);

        return $flag ? max($data) : min($data);
    }

    /**
     * 获取相对当前时间最小日期
     *
     * @param [type] $array
     * @param [type] $key
     * @param boolean $flag
     * @return void
     */
    public function getMinimumToCurrentTime(array $array, $key)
    {
        $data = array_filter($array, function ($d) use ($key) {
            if (\strtotime($d[$key]) < time()) {
                return true;
            }
        });

        if ($data) {
            $time = $this->get2ArrayValueFromData($data, $key, false);
        } else {
            $time = $this->get2ArrayValueFromData($array, $key, false);

        }

        return $time;

    }

    /**
     * 添加日志
     *
     * @param [type] $user_id       原用户id
     * @param [type] $name          原用户姓名
     * @param [type] $t_user_id     转换后用户id
     * @param [type] $t_name        转换后用户姓名
     * @return void
     */
    public function setLogInfo($user_id, $name, $t_user_id, $t_name)
    {
        return "转换前<用户id:{$user_id},用户姓名:{$name}>,转换后<用户id:{$t_user_id},用户姓名:{$t_name}>";
    }

}
