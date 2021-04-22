<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminRoleMenu extends Model
{

    protected $table = "admin_role_menus";

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ["role_id", "menu_id", "menu_actions"];

    public function menu()
    {
        return $this->hasOne(AdminMenu::class, "id", "menu_id");
    }

    public function setMenuActionsAttribute($value)
    {

        $this->attributes["menu_actions"] = \json_encode($value);
    }

    public function getMenuActionsAttribute($value)
    {

        return empty($value) ? [] : \json_decode($value);
    }
}
