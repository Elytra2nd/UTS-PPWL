<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin'); // Admin ke panel admin
            }
            return redirect('/dashboard'); // User biasa ke dashboard pembelian obat
        }
        return $next($request);
    }
}
