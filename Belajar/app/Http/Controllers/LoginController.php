<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login_proses(Request $request) {
        // dd($request->all());

        // process login
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // simpan data untuk login
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('failed', 'email atau password yang anda masukkan salah');
        }
    }


    public function logout() {
        // dd('check logout');
        Auth::logout();

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
