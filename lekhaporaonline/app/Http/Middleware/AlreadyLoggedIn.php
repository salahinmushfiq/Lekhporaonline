<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('LoggedUser') && (url('login')==$request->url()||url('register')==$request->url())){
            return redirect('admin')->with('fail','You have to Log in first');
//            return back();
        }else{
           
            return $next($request);
        }
        
    }
}
