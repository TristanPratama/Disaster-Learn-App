<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BiodataController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $count = Biodata::where('user_id', $userId)->count();

        if ($count != 0) {
            return redirect('/pretest');
        } else {
            return view('biodata');
        }
    }

    public function actionbiodata(Request $request)
    {
        $request->validate([
            '*' => 'required', // This will validate all input fields and require them to be filled
        ]);

        $userId = Auth::user()->id;

        Biodata::create([
            'nama_lengkap' => $request->nama_lengkap,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'institusi' => $request->institusi,
            'jenis_anggota' => $request->jenis_anggota,
            'p1' => $request->p1,
            'p2' => $request->p2,
            'p3' => $request->p3,
            'user_id' => $userId
        ]);

        Session::flash('message', 'Penambahan Biodata Berhasil');
        return redirect('/pretest');
    }
}
