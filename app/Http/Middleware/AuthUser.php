<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthUser
{
    public function handle($request, Closure $next)
    {
        // 1. CEK LOGIN
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        $user = Auth::user();

        // 2. CEK STATUS
        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun anda tidak aktif. Hubungi admin.');
        }

        // 3. CEK AKSES BACKEND (waiter dilarang)
        if ($request->is('dashboard') 
            || $request->is('user*') 
            || $request->is('product*') 
            || $request->is('option*') 
            || $request->is('bill*')) 
        {
            if ($user->role === 'waiter') {
                return redirect()->route('home.frontend')
                    ->with('error', 'Anda tidak memiliki akses ke halaman admin.');
            }
        }

        // 4. ADMIN tidak boleh buka frontend
        if ($request->is('/') || $request->is('home') || $request->is('home*')) {
            if (in_array($user->role, ['admin', 'superadmin'])) {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
