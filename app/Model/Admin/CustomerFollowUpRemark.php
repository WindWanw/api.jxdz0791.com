<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:17
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class CustomerFollowUpRemark extends Model
{
    protected $table = "customer_follow_up_remark";

    public $fillable = ["customer_follow_id", "user_id", "remark", "status"];

    public function userInfo()
    {
        return $this->belongsTo(AdminUsersInfo::class, "user_id", "user_id");
    }
}
