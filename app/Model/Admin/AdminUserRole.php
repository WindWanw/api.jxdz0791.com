<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminUserRole extends Model
{
    //
    protected $table = "admin_user_roles";

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ["user_id", "role_id"];

    
}
