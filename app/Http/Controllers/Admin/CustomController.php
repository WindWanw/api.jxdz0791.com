<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 10:01
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facades\App\Service\Admin\AuthService;
use Facades\App\Service\Admin\CustomService;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * 客户列表
     *
     * @param Request $r
     * @return void
     */
    public function getCustomerList(Request $r)
    {

        $type = CustomService::getCustomerType($r->customer_menu_type);

        $list = CustomService::customer()->with([
            'contact' => function ($query) {
                $query->orderBy("id", "desc")->select(["id", "customer_id", "name", "phone", "phone_status"]);
            },
            'citys' => function ($query) {
                $query->select(["id", "name"]);
            },
            'followUp' => function ($query) {
                $query->orderBy("id", "desc");
            },
            'usersInfo' => function ($query) {
                $query->select(["id", "user_id", "name"]);
            },
            'userOrg' => function ($query) {
                $query->select(["id", "name"]);
            },
            'qualification' => function ($query) use ($r) {
                $query->select(["id", "customer_id", "p_type", "type", "val_time"])
                    ->status(1)
                    ->qualiWarning($r->quali_warning);
            },
        ])->whereHas("usersInfo", function ($query) use ($r) {
            $query->name($r->res_user_name);
        })
            ->where(function ($query) use ($r) {
                if ($r->quali_warning) {
                    $query->whereHas("qualification", function ($query) use ($r) {
                        $query->qualiWarning($r->quali_warning);

                    });
                }

                if ($info = $r->qualification) {

                    $data = $this->getMultiSelectValue($info);

                    $query->whereHas("qualification", function ($query) use ($data, $r) {

                        if ($r->quali_select_status) {
                            $query->pType($data[0])->Type($data[1]);

                        } else {

                            if (!empty($data[0])) {
                                $query->pType($data[0])->orType($data[1]);
                            } else {
                                $query->Type($data[1]);

                            }

                        }

                    });

                }
            })
            ->idIn($type)
            ->name($r->name)
            ->customerState($r->customer_state)
            ->city($r->city)
            ->customerType($r->customer_type)
            ->newStatus($r->new_status)
            ->security($r->s_p_warning)
            ->customerSource($r->source)
            ->status(1)
            ->orderBy("id", "desc")
            ->paginate($r->limit, ["*"]);

        $data = CustomService::getCustomerList($list);

        return $this->ok($list);
    }

    /**
     * 添加客户
     *
     * @param Request $r
     * @return void
     */
    public function addCustomer(Request $r)
    {

        if (CustomService::addCustomer($r)) {
            return $this->success("添加成功");
        }

        return $this->error("添加失败");
    }

    /**
     * 修改客户
     *
     * @param Request $r
     * @return void
     */
    public function editCustomer(Request $r)
    {

        if (CustomService::checkUnique(["number" => $r->number], 'customer', $r->id)) {
            return $this->error("客户编号已存在，请重新输入");
        }

        if (CustomService::editCustomer($r)) {
            return $this->success("修改成功");
        }

        return $this->error("修改失败");

    }

    /**
     * 获取跟进记录
     *
     * @param Request $r
     * @return void
     */
    public function getFollowUpRecord(Request $r)
    {

        return $this->ok(CustomService::getFollowUpRecord($r));
    }

    /**
     * 添加更近情况
     *
     * @param Request $r
     * @return void
     */
    public function addFollowUp(Request $r)
    {
        if (CustomService::addFollowUp($r)) {
            return $this->success("添加成功");
        }

        return $this->error("添加失败");

    }

    /**
     * 回复跟进
     *
     * @param Request $r
     * @return void
     */
    public function addFollowUpRemarks(Request $r)
    {
        if (CustomService::addFollowUpRemarks($r)) {
            return $this->success("添加成功");
        }

        return $this->error("添加失败");

    }

    /**
     * 获取负责人
     *
     * @param Request $r
     * @return void
     */
    public function getHeadUser(Request $r)
    {

        $orgs = [];
        //获取组织架构父级子级集合
        if (isset($r->org)) {
            $orgs = AuthService::getOrgsList($r->org);
        }

        $list = CustomService::usersInfo()
            ->with(["org" => function ($query) {
                $query->select(["id", "name"]);
            }])
            ->whereHas("org", function ($query) use ($orgs) {
                $query->org($orgs);
            })
            ->name($r->name)
            ->orderBy("id", "desc")
            ->paginate($r->limit, ["id", "user_id", "name"]);

        return $this->ok($list);
    }

    /**
     * 添加转交信息
     *
     * @param Request $r
     * @return void
     */
    public function addTransInfo(Request $r)
    {
        if (CustomService::addTransInfo($r)) {
            return $this->success("添加成功");
        }

        return $this->error("添加失败");

    }
}
