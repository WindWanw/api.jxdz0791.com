<?php
/**
 * Created by PhpStorm
 * User: lipeng
 * Date: 2021/4/13
 * Time: 16:04
 */

namespace App\Http\Requests;


use Illuminate\Http\Request;

class BaseRequest extends Request
{
    public function expectsJson()
    {
        return true;
    }

    public function wantsJson()
    {
        return true;
    }
}
