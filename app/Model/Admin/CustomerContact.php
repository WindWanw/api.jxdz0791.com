<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:16
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class CustomerContact extends Model
{
    protected $table = "customer_contact";

    public $fillable = ["customer_id", "name", "phone", "phone_status", "status"];
}
