<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:16
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;
use Facades\App\Helpers\Config\ConfigCustomer;

class CustomerFollowUp extends Model
{
    protected $table = "customer_follow_up";

    public $fillable = ["customer_id", "user_id", "type", "remarks", "status"];

    public function user()
    {
        return $this->belongsTo(AdminUser::class, "user_id", "id");
    }

    public function userInfo()
    {
        return $this->belongsTo(AdminUsersInfo::class, "user_id", "user_id");
    }

    public function followUpRemark()
    {
        return $this->hasMany(CustomerFollowUpRemark::class, "customer_follow_id", "id");
    }

    public function getTypeAttribute($value)
    {

        $data = ConfigCustomer::followUpType();

        foreach ($data as $v) {
            if ($v["value"] == $value) {
                return $v["key"];
            }
        }

        return "";
    }

    public function getCreatedTimeAttribute()
    {

        if ($time = $this->attributes["created_at"]) {
            return \date("m月d日 H:i分", strtotime($time));
        }
    }

    public function scopeCustomer($query, $value)
    {
        if (isset($value)) {
            return $query->where("customer_id", $value);
        }
    }

}
