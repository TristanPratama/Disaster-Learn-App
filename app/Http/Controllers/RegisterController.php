<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        $sameEmail = User::where('email', $request->email)->count();

        if ($sameEmail != 0) {
            Session::flash('error', 'Alamat email telah terdaftar!');
            return redirect('/register');
        } else {
            User::create([
                'email' => $request->email,
                'name' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'responden'
            ]);

            Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
            return redirect('/');
        }
    }
}
