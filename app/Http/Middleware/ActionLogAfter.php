<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\log;
use DB;
use Illuminate\Support\Facades\response;
use App\models\actionlog;
use Str;

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

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // // print_r($request->all());

        // // print_r($request->id);
        // // print_r($request->path());
        $url = Str::afterlast($request->path(),'/');
        if(Str::contains($request->path(),'log') or $url == 'apitokencheck' or $url == 'sidebar'){

        }else{
            // print_r($response);
            // exit;
            if ($response->original['status'] == '200'){
                actionlog::where('user',$request->id)->get()->last()->update([
                    'result' => 'success',
                ]);

            }else{
                actionlog::where('user',$request->id)->get()->last()->update([
                    'result' => 'fail',
                ]);
            }
        }
        return $response;
    }
}
