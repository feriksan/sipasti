<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        Auth::user()->nama;
        $data = [
            'judul_web' => 'Dashboard',
            'judul_halaman' => 'Dashboard Administrator',
        ];
        return view('home/dashboard', $data);
    }


    public function operator()
    {
        Auth::user()->nama;
        $data = [
            'judul_web' => 'Dashboard',
            'judul_halaman' => 'Dashboard Operator',
        ];
        return view('home/dashboard', $data);
    }
}
