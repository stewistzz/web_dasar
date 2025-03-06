<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //

    // function untuk melakukan load dari halaman dashboard admin lte
    public function dashboard() {
        return view('dashboard');
    }
    public function index() {

        // get data user
        $data = User::get();
        return view('index', compact('data')); //compact berguna agar hanya menuliskan nama variabel saja tanpa tanda $
    }

    public function create () {
        return view('create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // pengkondisian jika gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // proses input kedalam database
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);

        // create data
        User::create($data);
         
        return redirect()->route('index');
    }

    // method untuk menampilkan data yang akan diedit
    public function edit(Request $request, $id) {
        // ambil data dengan menggunakan find
        $data = User::find($id);

        // dd($data);

        // tampilkan kedalam view edit yang baru
        return view('edit', compact('data'));
    }

    // method untuk mengupdate data
    public function update(Request $request, $id) {
        // cek apakah data yang di klik sudah masuk
        // dd($request->all());

        // memasukkan data kedalam database
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            // password dibuat nullable dikarenakan bersifat opsional
            'password' => 'nullable',
        ]);

        // pengkondisian jika gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // proses input kedalam database
        $data['email'] = $request->email;
        $data['name'] = $request->name;

        // verifikasi perubahan pada password jika ada

        // analogi jika request pergantian password dari user dilakukan maka ubah passwordnya
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // create data berdasarkan id user dari parameter dan lakukan update kedalam database
        User::whereId($id)->update($data);
         
        return redirect()->route('index');
    }

    public function delete(Request $request, $id) {
        $data = User::find($id);

        // logika untuk menghapus
        if ($data) {
            // panggil method delete
            $data->delete();
        }

        return redirect()->route('index');
    }
}
