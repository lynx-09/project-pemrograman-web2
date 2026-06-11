<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //menampilkan halaman login
    public function showLogin(){
        return view('login');
    }
    //memproses data login
    public function login(Request $request){
        $akun = $request->validate(
            [
            'email' => 'required|email',
            'password' => 'required'
            ]
        );
        //cek apakah email dan password benar
        if (Auth::attempt($akun)) {
            //buat session
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }
        //jika email atau password salah dengan pesan error
        return back()->withErrors(['login_error' => 'Email atau password salah']);
    }
    //proses logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}