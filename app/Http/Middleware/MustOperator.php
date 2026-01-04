<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustOperator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil user yang sedang login
        $user = $request->user();

        // Jika user tidak login atau role_id bukan 1 atau 2, redirect ke dashboard
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
