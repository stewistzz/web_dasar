<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // controller untuk home
    public function home() {
        return view('home');
    }
    // controller untuk categorys
    public function category()
    {
        return view('category');
    }
    // controller untuk user
    public function user($id, $name) {
        return view('user', [
            'id' => $id,
            'name' => $name 
        ]);
    }
    // controller untuk transaksi
    public function transaksi() {
        return view('transaksi');
    }
}
