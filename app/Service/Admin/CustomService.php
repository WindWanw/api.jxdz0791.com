<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 10:02
 */

namespace App\Service\Admin;

use App\Model\Admin\AdminUsersInfo;
use App\Model\Admin\Customer;
use App\Model\Admin\CustomerContact;
use App\Model\Admin\CustomerFollowUp;
use App\Model\Admin\CustomerFollowUpRemark;
use App\Model\Admin\CustomerLog;
use App\Model\Admin\CustomerQua;
use App\Model\Admin\CustomerShare;
use App\Service\Service;

class CustomService extends Service
{
    public function customer()
    {
        return new Customer();
    }

    public function contact()
    {
        return new CustomerContact();
    }

    public function qualification()
    {
        return new CustomerQua;
    }

    public function followUp()
    {
        return new CustomerFollowUp();
    }

    public function followUpRemark()
    {
        return new CustomerFollowUpRemark();
    }

    public function usersInfo()
    {
        return new AdminUsersInfo();
    }

    public function log()
    {
        return new CustomerLog();
    }

    public function share()
    {
        return new CustomerShare();
    }

    /**
     * 获取客户管理类型数据
     *
     * all:全部
     * my:我的
     * public:公共
     * sub:下属
     *
     * @return void
     */
    public function getCustomerType($type = "all")
    {

        $customer_id = [];

        switch ($type) {
            case "all":

                break;
            case "my":
                $customer_id = $this->_getMyCustomerType();
                break;
            case "public":
                $customer_id = $this->getArrayValue($this->customer()->resUserId("")->get("id"), "id");
                break;
            case "sub":
                
                break;
        }

        return $customer_id;
    }

    /**
     * 获取我的客户id
     *
     * @return void
     */
    private function _getMyCustomerType()
    {

        $share = $this->getArrayValue($this->share()->user($this->getUserId())->get(["customer_id"])->toArray(), "customer_id");

        $customer = $this->getArrayValue($this->customer()->resUserId($this->getUserId())->get(["id"])->toArray(), "id");

        return array_unique(array_merge($share, $customer));

    }

    /**
     * 处理客户列表数据
     *
     * @param [type] $data
     * @return void
     */
    public function getCustomerList($data)
    {

        foreach ($data as $key => $value) {

            $data[$key]["recent_contact"] = $this->getRecentContactName($value->contact);
            $data[$key]["recent_follow_up"] = $this->getRecentFollowUpTime($value->followUp);
            $data[$key]["recent_quali_val_time"] = $this->getRecentQualiValTime($value->qualification);
            $data[$key]["recent_anxu_val_time"] = $this->getWarningTime($value->anxu_val_time);

            //获取城市数组
            $data[$key]["city"] = array_filter([$value->province, $value->city, $value->area]);

            //获取资质数据
            $data[$key]["quali"] = $this->getQuali($value->qualification);

        }

        return $data;
    }

    /**
     * 获取资质数据
     *
     * @param [type] $data
     * @return void
     */
    private function getQuali($data)
    {
        if ($data->toArray()) {

            foreach ($data as $key => $value) {
                $info[$key] = [
                    "id" => $value->id,
                    "type" => array_filter([$value->p_type, $value->type]),
                    "val_time" => $value->val_time,
                ];
            }

            return $info;
        }

        return [["type" => [], "val_time" => ""]];
    }

    /**
     * 获取最近资质有效期
     *
     * @param [type] $data
     * @return void
     */
    private function getRecentQualiValTime($data)
    {

        if ($info = $data->toArray()) {

            return $this->getWarningTime($this->getMinimumToCurrentTime($info, "val_time"));

        }

        return "";

    }

    /**
     * 获取最近跟进时间
     *
     * @param [type] $data
     * @return void
     */
    private function getRecentFollowUpTime($data)
    {

        if ($info = $data->toArray()) {

            return $this->getFollowUpTime($this->getMinimumToCurrentTime($info, "created_at"));

        }

        return "";
    }

    /**
     * 获取最近联系人
     *
     * @param [type] $data
     * @return void
     */
    private function getRecentContactName($data)
    {

        if ($data->toArray()) {

            foreach ($data as $key => $value) {
                return $value->name;
            }
        }

        return "";
    }

    /**
     * 添加客户
     *
     * @param [type] $r
     * @return void
     */
    public function addCustomer($r)
    {
        $contacts = $this->getNotEmptyData($r->contact);

        $qualis = $this->getNotEmptyData($r->quali);

        return $this->action(function ($r, $contacts, $qualis) {

            //客户数据
            $customers = array_filter([
                "number" => $r->number,
                "customer_type" => $r->customer_type,
                "name" => $r->name,
                "type" => $r->type,
                "customer_state" => $r->customer_state,
                "provice" => $this->getValueFromArray($r->city),
                "city" => $this->getValueFromArray($r->city, 1),
                "area" => $this->getValueFromArray($r->city, 2),
                "establish_date" => $r->establish_date,
                "introduce" => $r->introduce,
                "company_qua_remarks" => $r->company_qua_remarks,
                "anxu_val_time" => $r->anxu_val_time,
                "enclosure" => $r->enclosure,
                "source" => $r->source,
                "w_user_id" => $this->getUserId(),
                "res_user_id" => $this->getUserId(),

            ]);

            //添加客户
            $customer = $this->customer()->create($customers);

            if (!$customer) {
                return false;
            }

            if ($contacts) {
                //循环添加联系人
                foreach ($contacts as $key => $value) {

                    $value["customer_id"] = $customer->id;

                    if (!$this->contact()->create($value)) {
                        return false;
                    }
                }

            }

            if ($qualis) {

                foreach ($qualis as $key => $value) {

                    $v = array_filter([
                        "customer_id" => $customer->id,
                        "p_type" => $this->getValueFromArray($value["type"]),
                        "type" => $this->getValueFromArray($value["type"], 1),
                        "val_time" => $value["val_time"],
                    ]);

                    if (!$this->qualification()->create($v)) {
                        return false;
                    }
                }
            }

            return true;

        }, $r, $contacts, $qualis);
    }

    /**
     * 修改客户信息
     *
     * @param [type] $r
     * @return void
     */
    public function editCustomer($r)
    {
        $contacts = $this->getNotEmptyData($r->contact);

        $qualis = $this->getNotEmptyData($r->quali);

        $customer = $this->customer()->find($r->id);

        return $this->action(function ($r, $customer, $contacts, $qualis) {

            //客户数据
            $customers = array_filter([
                "number" => $r->number,
                "customer_type" => $r->customer_type,
                "name" => $r->name,
                "type" => $r->type,
                "customer_state" => $r->customer_state,
                "provice" => $this->getValueFromArray($r->city),
                "city" => $this->getValueFromArray($r->city, 1),
                "area" => $this->getValueFromArray($r->city, 2),
                "establish_date" => $r->establish_date,
                "introduce" => $r->introduce,
                "company_qua_remarks" => $r->company_qua_remarks,
                "anxu_val_time" => $r->anxu_val_time,
                "enclosure" => $r->enclosure,
                "source" => $r->source,

            ]);

            if (!$customer->update($customers)) {
                return false;
            }

            if ($contacts) {
                //循环添加联系人
                foreach ($contacts as $key => $value) {

                    //如果存在联系人id，表示修改
                    if (isset($value["id"])) {

                        if (!$this->contact()->find($value["id"])->update($value)) {
                            return false;
                        }
                    } else {
                        $value["customer_id"] = $r->id;

                        if (!$this->contact()->create($value)) {
                            return false;
                        }

                    }

                }

            }

            if ($qualis) {

                foreach ($qualis as $key => $value) {

                    $v = array_filter([
                        "p_type" => $this->getValueFromArray($value["type"]),
                        "type" => $this->getValueFromArray($value["type"], 1),
                        "val_time" => $value["val_time"],
                    ]);

                    if (isset($value["id"])) {

                        if (!$this->qualification()->find($value["id"])->update($v)) {
                            return false;
                        }
                    } else {
                        $v["customer_id"] = $r->id;
                        if (!$this->qualification()->create($v)) {
                            return false;
                        }

                    }

                }
            }

            return true;

        }, $r, $customer, $contacts, $qualis);

    }

    /**
     * 获取客户跟进记录
     *
     * @param [type] $cid   客户id
     * @return void
     */
    public function getFollowUpRecord($r)
    {

        $list = $this->followUp()
            ->with([
                "user" => function ($query) {
                    $query->select(["id", "head_img"]);
                },
                "userInfo" => function ($query) {
                    $query->select(["user_id", "name"]);
                },
                "followUpRemark" => function ($query) {
                    $query->with([
                        "userInfo" => function ($query) {
                            $query->select(["user_id", "name"]);
                        },
                    ])->select(["customer_follow_id", "user_id", "remark"]);
                },
            ])
            ->customer($r->id)
            ->orderBy("id", "desc")
            ->paginate($r->limit, ["id", "user_id", "type", "remarks", "created_at"]);

        foreach ($list as $key => $value) {

            $value->setAppends(["created_time"]);
        }

        return $list;
    }

    /**
     * 添加跟进信息
     *
     * @param [type] $r
     * @return void
     */
    public function addFollowUp($r)
    {

        return $this->action(function ($r) {

            $data = array_filter([
                "customer_id" => $r->id,
                "user_id" => $this->getUserId(),
                "type" => $r->type,
                "remarks" => $r->remarks,
            ]);

            if (!$this->followUp()->create($data)) {
                return false;
            }

            if ($r->contact) {

                foreach ($r->contact as $key => $value) {

                    if (!$this->contact()->find($value["id"])->update(["phone_status" => $value["phone_status"]])) {
                        return false;
                    }
                }
            }

            return true;
        }, $r);
    }

    /**
     * 回复跟进信息
     *
     * @param [type] $r
     * @return void
     */
    public function addFollowUpRemarks($r)
    {

        $data = array_filter([
            "customer_follow_id" => $r->id,
            "user_id" => $this->getUserId(),
            "remark" => $r->remark,
        ]);

        return $this->followUpRemark()->create($data);
    }

    /**
     * 转交
     *
     * @param [type] $r
     * @return void
     */
    public function addTransInfo($r)
    {

        return $this->action(function ($r) {

            if (!$this->customer()->find($r->id)->update(["res_user_id" => $r->user_id])) {
                return false;
            }

            $logs = [
                "customer_id" => $r->id,
                "user_id" => $this->getUserId(),
                "info" => $this->setLogInfo($r->res_user_id, $r->res_name, $r->user_id, $r->name),
            ];

            if (!$this->log()->create($logs)) {
                return false;
            }

            return true;

        }, $r);
    }

}
