<?php

namespace App\Service\Admin;

use App\Model\Admin\Area;
use App\Service\Service;

/**
 * 处理系统管理模块
 */
class SystemService extends Service
{

    public function area()
    {
        return new Area();
    }

    /**
     * 根据id获取其等级
     *
     * @param [type] $id
     * @return void
     */
    private function getLevel($id)
    {

        return $this->area()->find($id)->level;
    }

    /**
     * 地区树形数据
     *
     * @return void
     */
    public function getAreaTree()
    {

        $list = $this->area()
            ->orderBy("sort", "desc")
            ->get(["id", "pid", "name", "sort", "status"])
            ->toArray();

        $data = $this->getInfinitePolarClassification($list);

        return $data;
    }

    /**
     * 地区列表
     *
     * @return void
     */
    public function getAreaList()
    {

        $list = $this->area()
            ->orderBy("sort", "desc")
            ->with(["user" => function ($query) {
                $query->select(["id", "username", "nickname", "phone", "head_img"]);
            }])
            ->get()
            ->toArray();

        $data = $this->getInfinitePolarClassification($list);

        return $data;
    }

    /**
     * 添加地区
     *
     * @param [type] $data
     * @return void
     */
    public function addArea($r)
    {
        $data = [
            "pid" => $r->pid,
            "name" => $r->name,
            "level" => $this->getLevel($r->pid) + 1,
            "sort" => $r->sort,
            "user_id" => $this->getUserId(),
            "status" => $r->status,
        ];

        return $this->area()->create($data);
    }

    /**
     * 修改地区
     *
     * @param [type] $data
     * @return void
     */
    public function editArea($data)
    {
        return $this->area()->find($data["id"])->update($data);
    }
}
