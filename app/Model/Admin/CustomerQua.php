<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/15
 * Time: 14:18
 */

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class CustomerQua extends Model
{
    protected $table = "customer_qua";

    public $fillable = ["customer_id", "p_type", "type", "val_time", "status"];

    public function scopeQualiWarning($query, $value)
    {
        if (isset($value)) {
            $format = "Y-m-d";

            $today = date($format, time());

            $end = date($format, \strtotime("+ $value days"));

            return $query->whereBetween("val_time", [$today, $end]);

        }
    }

    public function scopeStatus($query, $value)
    {
        if (isset($value)) {
            return $query->where("status", $value);
        }
    }

    public function scopePType($query, $value)
    {
        if (isset($value) && !empty($value)) {

            switch (true) {
                case is_array($value):
                    return $query->whereIn("p_type", $value);
                case (\is_string($value) || \is_numeric($value)):
                    return $query->where("p_type", $value);
            }
        }
    }

    public function scopeType($query, $value)
    {
        if (isset($value) && !empty($value)) {

            switch (true) {
                case is_array($value):
                    return $query->whereIn("type", $value);

                    foreach ($value as $v) {
                        $query->where("type",$v);
                    }

                    break;
                case (\is_string($value) || \is_numeric($value)):
                    return $query->where("type", $value);
            }
        }
    }

    public function scopeOrType($query, $value)
    {
        if (isset($value) && !empty($value)) {

            switch (true) {
                case is_array($value):
                    return $query->orWhereIn("type", $value);
                case (\is_string($value) || \is_numeric($value)):
                    return $query->orWhere("type", $value);
            }
        }
    }
}
