<?php

namespace App\Model\Admin;

use App\Model\BaseModel as Model;

class Qualification extends Model
{
    //
    public $table = "config_qualification_categorys";

    public $fillable = ["pid", "title", "sort", "status"];
}
