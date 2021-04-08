<?php

namespace App\Service;

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
                    $v["disabled"] = (bool) $v["status"];
                    $v["children"] = $this->getInfinitePolarClassification($list, $value["id"]);
                    $data[] = $v;

                }

            }

        }

        return $data;

    }
}
