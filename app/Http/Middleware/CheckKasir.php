<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckKasir
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role === 'kasir') {
            return $next($request);
        }

        return redirect('/'); // Ganti dengan rute atau tampilan halaman tidak diizinkan
    }
}
