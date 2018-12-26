<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckConfirmation
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
        if(Auth::user()->status == config('app.status_confirm')) {
            return $next($request);
        } else {
            Auth::logout();

            return redirect('login')->with('warning', 'You have not confirm your email address');
        }
    }
}
