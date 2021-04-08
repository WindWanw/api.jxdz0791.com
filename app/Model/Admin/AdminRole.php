<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    //
    protected $table = "admin_roles";

    protected $fillable = ["name", "describe"];

    public function user()
    {
        return $this->belongsTo(AdminUser::class, "create_id", "id");
    }

    public function setStatusAttribute($value)
    {
        $this->attributes["status"] = (int) $value;
    }

    public function getStatusAttribute($value)
    {
        return (bool) $value;
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }

}
