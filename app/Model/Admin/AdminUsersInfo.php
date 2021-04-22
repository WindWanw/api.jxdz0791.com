<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/13
 * Time: 16:33
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminUsersInfo extends Model
{
    protected $table = "admin_users_info";

    public $fillable = ["user_id", "job_number", "name", "gender"];

    public function users()
    {
        return $this->belongsTo(AdminUser::class, "user_id", "id");
    }

    public function org()
    {
        return $this->hasOneThrough(AdminOrg::class, AdminUserOrg::class, "user_id", "id", "user_id", "org_id");

    }

    public function scopeName($query, $value)
    {
        if (isset($value)) {
            return $query->where("name", "like", "%$value%");
        }
    }

    public function scopeJobNumber($query, $value)
    {
        if (isset($value)) {
            return $query->where("job_number", $value);
        }
    }
}
