<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Extra\Upload;
use App\Helpers\Response\ResponseFactory as R;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminMenu;
use App\Model\Admin\AdminRole;
use App\Model\Admin\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{

    //映射
    private function mapping()
    {
        return [
            'menu' => new AdminMenu(),
            'role' => new AdminRole(),
            'user' => new AdminUser(),
        ];
    }

    /**
     * 修改数据状态
     *
     * @param Request $r
     * @return void
     */
    public function processStatus(Request $r)
    {

        if (empty($r->name)) {
            return R::error("不存在名称标识");
        }

        $field = $r->field;

        try {

            $_mapping = $this->mapping();

            if (isset($_mapping[$r->name])) {

                $object = $_mapping[$r->name];

            } else {
                return R::error("程序中断！");
            }

            $query = $object->find($r->id);

            $query->$field = $r->status;

            if ($query->save()) {
                return R::success("操作成功");
            }

        } catch (\Exception $e) {

            print_r($e);
        }

    }

    /**
     * 删除
     *
     * @param Request $r
     * @return void
     */
    public function delete(Request $r)
    {

        if (empty($r->name)) {
            return R::error("不存在名称标识");
        }

        try {

            $_mapping = $this->mapping();

            if (isset($_mapping[$r->name])) {

                $object = $_mapping[$r->name];

            } else {
                return R::error("程序中断！");
            }

            if ($object->where("id", $r->id)->delete()) {
                return R::success("删除成功");

            }

        } catch (\Exception $e) {

            print_r($e);
        }

        return R::error("删除失败");

    }

    /**
     * 上传文件
     *
     * @param Request $r
     * @return void
     */
    public function upload(Request $r)
    {

        $u = new Upload();

        $result = $u->uploadFile($r);

        if (isset($result["error"])) {
            return R::error($result["message"], $result["error"]);
        }

        return R::success(["message" => "上传成功", "data" => $result["data"]]);
    }

    /**
     * 判断是否存在该文件
     *
     * @param Request $r
     * @return boolean
     */
    public function hasFile(Request $r)
    {

        $file = [
            'menu' => "App\\Helpers\\Config\\Menu",
        ];
        if (\class_exists($file[$r->name])) {

            return R::success(["message" => "文件存在", "fileName" => $file[$r->name]]);
        }

        return R::error("文件不存在");
    }

    /**
     * 获取七牛云token
     *
     * @param Request $r
     * @return void
     */
    public function getQiniuToken(Request $r)
    {

        $disk = Storage::disk("qiniu");

        return R::ok($disk->getDriver()->uploadToken());
    }

    /**
     * 获取上传至七牛云的文件地址
     *
     * @param Request $r
     * @return void
     */
    public function getFileName(Request $r)
    {

        return R::ok(Storage::disk("qiniu")->getDriver()->downloadUrl($r->name));
    }
}
