<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/14
 * Time: 16:39
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class Customer extends Model
{
    protected $table = "customer";

    public $fillable = ["number", "customer_type", "name", "type", "customer_state", "province", "city", "area", "establish_date", "introduce", "company_qua_remarks", "anxu_val_time", "enclosure", "source", "w_user_id", "res_user_id", "share", "status"];

    //关联
    public function contact()
    {
        return $this->hasMany(CustomerContact::class, "customer_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(AdminUser::class, "res_user_id", "id");
    }

    public function usersInfo()
    {
        return $this->belongsTo(AdminUsersInfo::class, "res_user_id", "user_id");
    }

    public function userOrg()
    {
        return $this->hasOneThrough(AdminOrg::class, AdminUserOrg::class, "user_id", "id", "res_user_id", "org_id");

    }

    public function provinces()
    {
        return $this->belongsTo(ConfigCity::class, "province", "id");
    }

    public function citys()
    {
        return $this->belongsTo(ConfigCity::class, "city", "id");
    }

    public function areas()
    {
        return $this->belongsTo(ConfigCity::class, "area", "id");
    }

    public function followUp()
    {
        return $this->hasMany(CustomerFollowUp::class, "customer_id", "id");
    }

    public function qualification()
    {
        return $this->hasMany(CustomerQua::class, "customer_id", "id");
    }

    //修改器
    public function getCreatedAtAttribute($value)
    {
        return date("Y/m/d", \strtotime($value));
    }

    public function setEnclosureAttribute($value)
    {
        $this->attributes["enclosure"] = $this->setFileUrl($value, true);
    }

    public function getEnclosureAttribute($value)
    {
        return $this->getFileUrl($value);
    }

    public function scopeIdIn($query, $value)
    {
        if (isset($value) && !empty($value)) {
            return $query->whereIn("id", $value);
        }
    }
    //查询
    public function scopeName($query, $value)
    {
        if (isset($value)) {
            return $query->where("name", "like", "%$value%");
        }
    }

    public function scopeCustomerState($query, $value)
    {
        if (isset($value)) {
            return $query->where("customer_state", $value);
        }
    }

    public function scopeCity($query, $value)
    {
        if ($value && is_array($value)) {
            switch (count($value)) {
                case 1:
                    return $query->where("province", end($value));
                case 2:
                    return $query->where("city", end($value));
                case 3:
                    return $query->where("area", end($value));

            }
        }
    }

    public function scopeCustomerType($query, $value)
    {
        if (isset($value)) {
            return $query->where("customer_type", $value);
        }
    }

    public function scopeNewStatus($query, $value)
    {

        $format = "Y-m-d";

        //今日时间
        $today = \strtotime(date($format, time()));

        if (isset($value)) {
            switch ($value) {
                case 1:

                    return $query->where("created_at", ">=", $this->getDate($today));
                case 2:
                    $start = \strtotime(date($format, \strtotime("-1 month")));

                    return $query->whereBetween("created_at", $this->getDate([$start, $today]));

                case 3:

                    $start = \strtotime(date($format, \strtotime("-1 year")));

                    return $query->whereBetween("created_at", $this->getDate([$start, $today]));

            }
        }
    }

    public function scopeSecurity($query, $value)
    {
        if (isset($value)) {

            $format = "Y-m-d";

            $today = date($format, time());

            $end = date($format, \strtotime("+ $value days"));

            return $query->whereBetween("anxu_val_time", [$today, $end]);

        }
    }

    public function scopeCustomerSource($query, $value)
    {
        if (isset($value)) {
            return $query->where("source", $value);
        }
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }

    public function scopeResUserId($query, $value)
    {
        if (isset($value)) {
            return $query->where("res_user_id", $value);
        }
    }

}
