<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guru
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
        if(session()->get('role') == 'guru')
        {
            if (!session('logged_in')) {
                return redirect('/loginadmin');
            }
            return $next($request);

        } else {
            return abort(404);
        }
    }
}
