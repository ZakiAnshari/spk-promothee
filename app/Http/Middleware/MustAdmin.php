<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login
        $user = $request->user();

        // Jika user memiliki role_id 2, 3, atau 4, redirect ke dashboard
        if ($user && in_array($user->role_id, [2, 3, 4])) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
