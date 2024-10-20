<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Posttest;
use App\Models\Pretest;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function term()
    {
        $userId = Auth::user()->id;
        $count = Biodata::where('user_id', $userId)->count();

        if ($count != 0) {
            return redirect()->back();
        } else {
            return view('term');
        }
    }

    public function materi1()
    {
        $userId = Auth::user()->id;
        $count = Posttest::where('user_id', $userId)->count();

        return view('materi1', compact('count', 'userId'));
    }

    public function materi2()
    {
        $userId = Auth::user()->id;
        $count = Posttest::where('user_id', $userId)->count();

        return view('materi2', compact('count'));
    }

    public function result()
    {
        $userId = Auth::user()->id;

        $biodata = Biodata::where('user_id', $userId)->first();
        $posttest = Posttest::where('user_id', $userId)->first();
        $pretest = Pretest::where('user_id', $userId)->first();
        $questions = Question::get();

        return view('result', compact('biodata', 'pretest', 'posttest', 'questions'));
    }
}
