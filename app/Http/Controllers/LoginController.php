<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Biodata;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('dashboard');
            }elseif (Auth::user()->role == 'old_responden') {
                return redirect('result');
            }else{
                return redirect('term');
            }
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $userId = Auth::user()->id;
            if (Auth::user()->role == 'admin') {
                return redirect('dashboard');
            }elseif (Auth::user()->role == 'old_responden') {
                return redirect('result');
            }else{
                $count = Biodata::where('user_id', $userId)->count();
                if ($count != 0) {
                    return redirect('/pretest');
                } else {
                    return redirect('term');
                }
            }
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
