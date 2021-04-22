<?php

namespace App\Http\Middleware;

use App\Helpers\Logger\BLogger;
use Closure;
use DB;

class TraceRecordMiddleware
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
        $log = BLogger::getStream();
        $sql_arr = [];
        DB::listen(function($query) use (&$sql_arr) {
            $bindings = $query->bindings;
            $sql = $query->sql;
            foreach ($bindings as $replace){
                $value = is_numeric($replace) ? $replace : "'".$replace."'";
                $sql = preg_replace('/\?/', $value, $sql, 1);
            }
            $sql_arr[] = $sql;

        });


        $response =$next($request);



        $log->info('==============================================================================================================================');
        $log->info(date("Y-m-d H:i:s"));
        $log->info('REQUEST:'.$request->getRequestUri());
        $log->info('HEADER:',$request->header());
        $log->info('INPUT:',$request->input());

        try{
            $log->info("RESPONSECODE:".$response->getStatusCode());
            $content = json_decode($response->getContent(),true);
            $log->info("RESPONSE:",$content);
        }
        catch(Exception $e)
        {
            $log->info("RESPONSE:error");
        }

        $log->info("SQL:",$sql_arr);

        return $response;
        //return $response;
    }
}
