<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if ($request->session()->has('teacher_id') || $request->session()->has('admin_id')) {
            return $next($request);
        }
        else {
            return redirect()->route('view_login_teacher')->with('error','Yor are not login,my bro');
        }
        
    }
}
