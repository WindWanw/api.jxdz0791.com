<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class AdminMenu extends Model
{
    //
    protected $table = "admin_menus";

    public function setStatusAttribute($value)
    {
        $this->attributes["status"] = (int) $value;
    }

    public function getStatusAttribute($value)
    {
        return (bool) $value;
    }

    public function scopeIsParent($query)
    {
        return $query->where('pid', 0);
    }

    public function scopeChildren($query, $value)
    {
        return $query->where('pid', $value);

    }

    public function scopeStatus($query, $value)
    {

        if (isset($value)) {
            return $query->where("status", $value);
        }

    }

    public function scopeCode($query, $value)
    {

        if (isset($value)) {
            return $query->where("code", $value);
        }

    }
}
