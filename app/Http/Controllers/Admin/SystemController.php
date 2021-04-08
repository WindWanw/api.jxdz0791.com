<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Response\ResponseFactory as R;
use App\Http\Controllers\Controller;
use Facades\App\Service\Admin\SystemService;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    /**
     * 获取地区树形数据
     *
     * @param Request $r
     * @return void
     */
    public function getAreaTree(Request $r)
    {

        $data = SystemService::getAreaTree();

        return R::ok($data);

    }

    /**
     * 获取地区列表数据
     *
     * @param Request $r
     * @return void
     */
    public function getAreaList(Request $r)
    {
        $data = SystemService::getAreaList();

        return R::ok($data);
    }

    /**
     * 添加地区
     *
     * @param Request $r
     * @return void
     */
    public function addArea(Request $r)
    {

        if (SystemService::checkUnique(["name" => $r->name], "area")) {
            return R::error("名称已经存在，请重新设置");
        }

        if (SystemService::addArea($r)) {
            return R::success("添加成功");
        }

        return R::error("添加失败");
    }

    /**
     * 修改地区
     *
     * @param Request $r
     * @return void
     */
    public function editArea(Request $r)
    {
        $data = $r->input();

        if (SystemService::checkUnique(["name" => $r->name], "area", $r->id)) {
            return R::error("名称已经存在，请重新设置");
        }

        if (SystemService::editArea($data)) {
            return R::success("修改成功");
        }

        return R::error("修改失败");

    }
}
