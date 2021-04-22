<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminOrg extends Model
{
    //
    protected $table  = "admin_orgs";

    public $fillable = ["pid", "name", "level", "sort", "user_id", "status"];

    public function user()
    {
        return $this->belongsTo(AdminUser::class, "user_id", "id");
    }

    public function scopeOrg($query, $value)
    {
        if (!empty($value)) {
            return $query->whereIn("id", $value);
        }
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }

}
