<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
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
        if (AUTH::User() == null) {
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Anda harus login dulu!');
            return redirect('/login');
        }
        return $next($request);
    }
}
