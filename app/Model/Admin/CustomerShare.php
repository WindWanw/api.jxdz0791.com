<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:19
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class CustomerShare extends Model
{
    protected $table = "customer_share";

    public $fillable = ["customer_id", "s_user_id", "status"];

    public function scopeUser($query, $value)
    {
        if (isset($value)) {
            return $query->where("s_user_id", $value);
        }
    }
}
