<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class mustlogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    

    

    public function handle($request, Closure $next){
        if(Auth::check()){
            // echo 'Auth status: yes'; 
            back(); //Auth check true 踢回現有頁面
			return back();
		}else{
            $response = $next($request);
            // echo 'Auth status: no'; 
            return $next($request);; //Auth check false, do nothting
		}
    }
}
