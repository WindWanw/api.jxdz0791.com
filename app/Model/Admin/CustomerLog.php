<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:18
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class CustomerLog extends Model
{
    protected $table = "customer_log";

    public $fillable = ["customer_id", "user_id", "info"];

    public function setInfoAttribute($value)
    {
        $this->attributes["info"] = \json_encode($value,JSON_UNESCAPED_UNICODE);
    }
}
