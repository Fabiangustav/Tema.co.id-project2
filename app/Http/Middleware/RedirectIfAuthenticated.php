<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // ❌ Jangan selalu ke /home, cek apakah URL admin
                if ($request->is('admin/*')) {
                    return redirect()->route('admin.dashboard.index');
                }

                return redirect('/home'); // default frontend
            }
        }

        return $next($request);
    }
}
