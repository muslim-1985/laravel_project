<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
        //настраиваем guard
    {
        //cтарый код
//        if (Auth::guard()->check()) {
//            return redirect('/home');
//        }

        switch ($guard) {
            case 'admin':
                if(Auth::guard()->check()){
                    return redirect()->route('home.user');
                }
                break;
            default:
                if(Auth::guard()->check()){
                    return redirect('/home');
                }
                break;

        }

        return $next($request);
    }
}
