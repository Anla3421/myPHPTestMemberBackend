<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\log;
use Auth;
use Route;

class ActionLogMiddleware

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
        Log::channel('actionlog')->info('request',['path'=> $request->path()]);
        Log::channel('actionlog')->info('request',['item'=> $request->all()]);

        
        // $user = Auth::loginUsingId(2);       
        // $user = Auth::user($request->id);
        // echo $user;
        // Log::channel('actionlog')->info('user',['user'=> $user]);

        // Log::channel('actionlog')->info('all',['request'=> $request->all()]);
        // Log::channel('actionlog')->info('path',['request'=> $request->path()]);
        // Log::channel('actionlog')->info('url',['request'=> $request->url()]);
        // Log::channel('actionlog')->info('getName',['request'=> $request->route()->getName()]);
        // Log::channel('actionlog')->info('route',['request'=> $request->route()]);

        // Log::channel('actionlog')->info('currentRouteName',['url'=>Route::currentRouteName()]);
        // Log::channel('actionlog')->info('getActionName',['url'=>Route::getCurrentRoute()->getActionName()]);
        // Log::channel('actionlog')->info('getCurrentRoute',['url'=>Route::getCurrentRoute()]);
        // Log::channel('actionlog')->info('uri',['url'=>Route::getFacadeRoot()->current()->uri()]);
        // Log::channel('actionlog')->info('current',['url'=>Route::getFacadeRoot()->current()]);
        // Log::channel('actionlog')->info('getFacadeRoot',['url'=>Route::getFacadeRoot()]);
        
        
        return $next($request);
    }
}
