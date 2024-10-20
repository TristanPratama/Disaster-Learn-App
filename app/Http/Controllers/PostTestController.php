<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posttest;
use App\Models\Pretest;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PostTestController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $count = Pretest::where('user_id', $userId)->count();

        if ($count == 0) {
            return redirect()->back();
        } else {
            $questions = Question::get();
            return view('posttest', compact('questions'));
        }
    }

    public function actionposttest(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $count = Pretest::where('user_id', $userId)->count();

        if ($count != 0) {
            $posttest = new Posttest;
            $posttest->user_id = $userId;
            $benar = 0;

            for($i = 1; $i <= count($data)-1; $i++) {
                $answer = "answer" . $i;

                $posttest->{$answer} = $request->{$answer};
                $kunci = Question::where('id', $i)->pluck('answer')->first();
                if ($posttest->{$answer} == $kunci) {
                    $benar += 1;
                }
            }

            $posttest->save();

            $hasilposttest = $benar/(count($data)-1)*100;
            Biodata::where('user_id', $userId)->update([
                'nilai_post' => $hasilposttest,
            ]);

            User::where('id', $userId)->update([
                'role' => 'old_responden',
            ]);
        }
        Session::flash('message', 'Pengisian Post Test Berhasil.');
        return redirect('result');
    }
}
