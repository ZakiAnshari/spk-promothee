<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    // LOGIN
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email harus benar',
            'password.required' => 'Password harus diisi!',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            toast('Email tidak ditemukan', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }
    
        if (!Hash::check($request->password, $user->password)) {
            toast('Password salah', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }
    
        Auth::login($user);
        $request->session()->regenerate();
    
        alert()->toast('Login berhasil', 'success')->width('fit-content');
        return redirect()->intended('dashboard');

    }
    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
