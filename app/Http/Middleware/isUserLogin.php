<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class isUserLogin
{
    /**
     * Handle an incoming request.
     *-
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $cond
     * @param string $route
     * @param string $store
     * @param string $status
     * @param string $message
     * @return mixed
     */
    public function handle($request, Closure $next,$cond,$route="homepage",$status="",$message="")
    {
        $cond = filter_var($cond, FILTER_VALIDATE_BOOLEAN);
        if(Auth::check() == $cond){
            return $next($request);
        }
        return redirect()->route($route)->with($status,$message);
    }
}
