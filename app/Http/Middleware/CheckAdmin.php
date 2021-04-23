<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if ($request->session()->has('admin_id')) {
            return $next($request);
        }
        else {
            return redirect()->route('view_login_admin')->with('error','Yor are not login,my bro');
        }
        
    }
}
