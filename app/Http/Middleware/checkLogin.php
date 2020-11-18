<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class checkLogin
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
        if(Auth::check()){
            //Kiem tra quyen admin
            //$use = Auth::user();
            //if($user->quyen){
            return $next($request);
        }
        else{
            return redirect()->intended('admin');
        }
    }
}
