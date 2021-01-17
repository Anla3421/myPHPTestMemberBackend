<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class mustlogin
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
    //     return $next($request);
    // }
    
    // public function handle($request, Closure $next){
    //     if(Auth::check()){
    //         echo 'Auth status: yes'; 
    //         back(); //Auth check true 踢回現有頁面
	// 		return back();
	// 	}else{
    //         $response = $next($request);
    //         echo 'Auth status: no'; 
    //         return $next($request);; //Auth check false, do nothting
		
    //     }
    // }
    public function handle($request, Closure $next){
        if(Auth::check()){
            // echo 'Auth status: yes'; 
            return $next($request);; //Auth check true, do nothting
		}else{
            // echo 'Auth status: no';  //Auth check false, 頁面導向
			return redirect()->intended('login'); 
        }
    }
}
