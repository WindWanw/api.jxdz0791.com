<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUserToken extends Model
{
    //
    protected $table = "admin_user_tokens";

    public $fillable = ["user_id", "access_token", "expired_time", "created_ip", "updated_ip"];
}
