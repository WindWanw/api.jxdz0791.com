<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminUser extends Model
{
    //
    protected $table = "admin_users";

    public function token()
    {
        return $this->hasOne(AdminUserToken::class, "user_id", "id");
    }

    public function users_info()
    {
        return $this->hasOne(AdminUsersInfo::class, "user_id", "id");
    }

    public function role()
    {
        return $this->hasOneThrough(AdminRole::class, AdminUserRole::class, "user_id", "id", "id", "role_id");
    }

    public function org()
    {
        return $this->hasOneThrough(AdminOrg::class, AdminUserOrg::class, "user_id", "id", "id", "org_id");

    }

    public function scopeUsername($query, $value)
    {
        if (isset($value)) {
            return $query->where("username", $value);
        }
    }

    //精确手机号查找
    public function scopeTel($query, $value)
    {
        if (isset($value)) {
            return $query->where("phone", $value);
        }
    }

    //模糊手机号查找
    public function scopePhone($query, $value)
    {
        if (isset($value)) {
            return $query->where("phone", "like", "%$value%");
        }
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }

    public function scopeStatusT($query, $value)
    {
        if (isset($value)) {
            switch ($value) {
                case '1':
                    return $query->whereBetween("status", [1, 2]);
                    break;

                default:
                    return $query->where("status", $value);
                    break;
            }
        }
    }

    public function getHeadImgAttribute($value)
    {
        return $this->getFileUrl($value);
    }
}
