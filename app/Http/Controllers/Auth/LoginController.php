<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // ❗ CEK EMAIL
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        // ❗ CEK STATUS AKTIF
        if ($user->status !== 'active') {
            return back()->with('error', 'Akun anda tidak aktif. Hubungi admin.');
        }

        // ✔ LOGIN
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();

            // simpan user ke session
            session(['user' => $user]);

            // 🔥 REDIRECT BERDASARKAN ROLE
            if ($user->role === 'waiter') {
                return redirect()->route('choose.table');
            }

            if ($user->role === 'admin' || $user->role === 'superadmin') {
                return redirect()->route('dashboard');
            }

            // fallback (jaga-jaga)
            return redirect('/');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
