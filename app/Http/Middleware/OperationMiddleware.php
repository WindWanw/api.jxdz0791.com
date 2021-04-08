<?php

namespace App\Http\Middleware;

use App\Helpers\Response\ResponseFactory as R;
use App\Model\Admin\OperationLog;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use \App;

class OperationMiddleware
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

        if ($request->isMethod('get')) {
            $request->limit = $request->limit ?? 10;
        } else if ($request->isMethod('post')) {

            //访问限制
            $result = $this->setInterfaceLimit($request->id);

            if ($result) {
                return R::error($result);
            }

            //记录使用了post接口的用户
            $this->setOperationLogs($request);

        }
        return $next($request);
    }

    /**
     * 获取用户id
     *
     * @return void
     */
    private function getUserId()
    {

        $app = App::make('App\Helpers\Instance\Token');

        return intval($app->userId);

    }

    /**
     * 获取接口
     *
     * @return void
     */
    private function getAction()
    {

        return array_slice(explode("\\", Route::currentRouteAction()), -1, 1)[0];

    }

    /**
     * 记录日志
     *
     * @param [type] $request
     * @return void
     */
    private function setOperationLogs($request)
    {
        $o = new OperationLog();

        try {

            $o->user_id = $this->getUserId();

            $o->action = $this->getAction();

            $o->content = json_encode($request->all(), JSON_UNESCAPED_UNICODE);

            $o->save();

        } catch (Exception $e) {
            throw new \Exception($e->getMessage());

        }

    }

    /**
     * 接口限制，设置三秒钟执行一次
     *
     * @return void
     */
    private function setInterfaceLimit($id)
    {

        //提交的数据id，保证操作数据唯一性
        $id = isset($id) ? $id : 1;

        $key = $this->getAction() . "_" . $this->getUserId() . "_" . $id;

        if (Cache::has($key)) {

            return "正在执行中，请等待三秒钟...";
        }

        Cache::put($key, 1, 3);

        return false;
    }
}
