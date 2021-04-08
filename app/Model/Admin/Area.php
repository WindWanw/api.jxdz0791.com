<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table  = "areas";

    public $fillable = ["pid", "name", "level", "sort", "user_id", "status"];

    public function user()
    {
        return $this->belongsTo(AdminUser::class, "user_id", "id");
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }
}
