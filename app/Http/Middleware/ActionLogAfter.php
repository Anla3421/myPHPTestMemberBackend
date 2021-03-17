<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\log;
use DB;
use Illuminate\Support\Facades\response;

class ActionLogAfter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     $response = $next($request); //先處理 request （next 本身是閉包，會先處理 request)
    //     // Perform action			 //這裡才執行任務
    //     // Log::channel('actionlog')->info('after',['item'=> $request->all()]);
    //     print_r('我是後中介層');
    //     return $response;
    // }

    public function handle($Request, Closure $next)
    {
         // $response = $next($request);
        print_r('我是後中介層');
        
         // var_dump($request->all());
         // print_r(response::json());
         // exit;
         // var_dump($response->all());
         // if ($response->status() == 200){
         //     DB::table('action_log')->latest()->update([
         //         'alter_result' => 'success',
         //     ]);
         // }else{
         //     DB::table('action_log')->latest()->update([
         //         'alter_result' => 'fail',
         //     ]);
         // }
         // print_r($response->status());
        return $Response;
    }
}
