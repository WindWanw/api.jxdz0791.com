<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminUserOrg extends Model
{
    //
    public $table = "admin_user_orgs";

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = ["user_id", "org_id"];

    public function setOrgIdAttribute($value)
    {
        $this->attributes["org_id"] = is_array($value) ? end($value) : $value;
    }
}
