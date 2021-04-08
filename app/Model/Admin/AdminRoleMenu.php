<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRoleMenu extends Model
{

    protected $table = "admin_role_menus";

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ["role_id", "menu_id"];

}
