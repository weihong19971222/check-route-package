<?php
namespace weihong\checkRoute\Midd;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRouteName{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        $route = Route::getRoutes()->match($request);
        $currentroute = $route->getName();
        if(is_null($currentroute)){
            return $next($request);
        }
        $request->attributes->add(['route-name'=>$currentroute]);
        return $next($request);
    }
}
