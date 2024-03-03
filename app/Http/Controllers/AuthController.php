<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ====== Halaman Login =======
    function index()
    {
        $data = [
            'judul_web' => 'Login',
            'judul_halaman' => 'Login',
        ];
        return view('user/user_login', $data);
    }


    // ========== Proses Login ===========
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $cek_login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($cek_login)) {
            if (Auth::user()->role == 'Admin') {
                return redirect('/home')->with('pesan', 'Anda Login Sebagai Administrator!!');
            } elseif (Auth::user()->role == 'Operator') {
                return redirect('home/operator')->with('pesan', 'Anda Login Sebagai Operator!!');
            }
        } else {
            return Redirect('/')->with('error', 'Gagal Login. E-mail atau Password Salah !!');
        }
    }

    // ========= Porses Logout ===========
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
