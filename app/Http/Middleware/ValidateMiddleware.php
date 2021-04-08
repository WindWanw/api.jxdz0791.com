<?php

namespace App\Http\Middleware;

use App\Helpers\Response\Enum;
use App\Helpers\Response\ResponseFactory as R;
use Closure;
use Facades\App\Http\Requests\Validate\Validation;

class ValidateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $res = Validation::process($request);

        if (isset($res["error"])) {

            return R::error($res["error"], Enum::VALIDATE_ERROR);
        }

        return $next($request);
    }
}
