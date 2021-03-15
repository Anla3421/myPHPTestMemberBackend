<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\log;

class ActionLogAfter
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
        $response = $next($request); //先處理 request （next 本身是閉包，會先處理 request)
        // Perform action			 //這裡才執行任務
        // Log::channel('actionlog')->info('after',['item'=> $request->all()]);
        print_r('我是後中介層');
        return $response;
    }
}
