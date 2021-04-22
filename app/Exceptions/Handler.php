<?php

namespace App\Exceptions;

use App\Helpers\Response\Enum;
use App\Helpers\Response\ResponseFactory;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return ResponseFactory::error("URL请求方式不对",Enum::ROUTES_ERROR_METHOD);
        }
        if ($exception instanceof NotFoundHttpException) {
            return ResponseFactory::error("URL地址错误",Enum::ROUTES_ERROR);
        }

        if (!$request->is('admin/*') && $exception) {
            return ResponseFactory::error("503",Enum::SERVICE_ERROR);
            //return response()->view('503');
        }
        return parent::render($request, $exception);
    }
}
