<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Biodata;
use App\Models\Pretest;
use App\Models\Posttest;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\RespondenExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ExportMultipleSheets;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $respondens = Biodata::all();
        $RespondenCount = Biodata::all()->count();
        $PretestCount = Pretest::all()->count();
        $PosttestCount = Posttest::all()->count();

        return view('admin.adminHome', compact('respondens', 'RespondenCount', 'PretestCount', 'PosttestCount'));
    }

    public function show_responden($userid)
    {
        // Find the record by ID
        $User = User::where('id',$userid)->first();
        $Responden = Biodata::where('user_id',$userid)->first();
        $Pretest = Pretest::where('user_id',$userid)->first();
        $Posttest = Posttest::where('user_id',$userid)->first();
        $questions = Question::all();

        return view('admin.adminResponden', compact('User','Responden', 'Pretest', 'Posttest', 'questions'));
    }

    public function responden_destroy($userid)
    {
        // Find the record by User ID
        $Responden = Biodata::where('user_id',$userid)->first();
        $Pretest = Pretest::where('user_id',$userid)->first();
        $Posttest = Posttest::where('user_id',$userid)->first();
        $User = User::where('id',$userid)->first();

        // Delete the record
        if ($Responden != null) {
            $Responden->delete();
        }
        if ($Pretest != null) {
            $Pretest->delete();
        }
        if ($Posttest != null) {
            $Posttest->delete();
        }

        // Change Role User
        $User->role = 'responden';
        $User->save();

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question()
    {
        $questions = Question::all();

        return view('admin.adminQuestion', compact('questions'));
    }

    public function question_update(Request $request, $id)
    {
        // Validate the request data, if needed
        $request->validate([
            'value' => 'required|string|max:255',
            'answer' => 'required|boolean',
        ]);

        // Find the record by ID
        $question = Question::findOrFail($id);

        // Update the record with the new data
        $question->update([
            'value' => $request->input('value'),
            'answer' => $request->input('answer'),
        ]);

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Question updated successfully.');
    }

    public function question_destroy($id)
    {
        // Find the record by ID
        $question = Question::findOrFail($id);

        // Delete the record
        $question->delete();

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function export_excel()
    {
        return Excel::download(new RespondenExport, 'data_responden.xlsx');
    }
}

