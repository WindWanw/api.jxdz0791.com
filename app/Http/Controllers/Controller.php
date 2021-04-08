<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App;
use App\Model\Index\Domain;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get the user ID when login to auth
     *
     * @return UserId
     * */
    public function getUserId()
    {

        $uid = 1;

        try {
            $app = App::make('App\Helpers\Instance\Token');

            $uid = intval($app->userId);
        } catch (Exception $e) {
        }

        return $uid;
    }


}
