<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pretest;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

class PreTestController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $count = Pretest::where('user_id', $userId)->count();

        if ($count != 0) {
            return redirect('materi1');
        } else {
            $questions = Question::get();
            return view('pretest', compact('questions'));
        }
    }

    public function actionpretest(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $count = Pretest::where('user_id', $userId)->count();

        if ($count == 0) {
            $pretest = new Pretest;
            $pretest->user_id = $userId;
            $benar = 0;

            for($i = 1; $i <= count($data)-1; $i++) {
                $answer = "answer" . $i;

                $pretest->{$answer} = $request->{$answer};
                $kunci = Question::where('id', $i)->pluck('answer')->first();
                if ($pretest->{$answer} == $kunci) {
                    $benar += 1;
                }
            }

            $pretest->save();

            $hasilPretest = $benar/(count($data)-1)*100;
            Biodata::where('user_id', $userId)->update([
                'nilai_pre' => $hasilPretest,
            ]);
        }
        Session::flash('message', 'Pengisian Pre Test Berhasil. Tonton materi di bawah ini untuk menambah pemahaman Anda sebelum mengerjakan tes kembali.');
        return redirect('materi1');
    }
}
