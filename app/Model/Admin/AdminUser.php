<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //
    protected $table = "admin_users";

    public function token()
    {
        return $this->hasOne(AdminUserToken::class, "user_id", "id");
    }

    public function role()
    {
        return $this->hasOneThrough(AdminRole::class, AdminUserRole::class, "user_id", "id", "id", "role_id");
    }

    public function setStatusAttribute($value)
    {
        $this->attributes["status"] = (int) $value;
    }

    public function getStatusAttribute($value)
    {
        return (bool) $value;
    }
}
