<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PreTestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('guest');

Route::get('term', [HomeController::class, 'term'])->name('term')->middleware('role:responden');
Route::get('materi1', [HomeController::class, 'materi1'])->name('materi1')->middleware('role:responden,old_responden');
Route::get('materi2', [HomeController::class, 'materi2'])->name('materi2')->middleware('role:responden,old_responden');
Route::get('result', [HomeController::class, 'result'])->name('result')->middleware('role:old_responden');

Route::get('pretest', [PretestController::class, 'index'])->name('pretest')->middleware('role:responden');
Route::post('actionpretest', [PretestController::class, 'actionpretest'])->name('actionpretest')->middleware('role:responden');

Route::get('posttest', [PostTestController::class, 'index'])->name('posttest')->middleware('role:responden');
Route::post('actionposttest', [PostTestController::class, 'actionposttest'])->name('actionposttest')->middleware('role:responden');

Route::get('biodata', [BiodataController::class, 'index'])->name('biodata')->middleware('role:responden');
Route::post('actionbiodata', [BiodataController::class, 'actionbiodata'])->name('actionbiodata')->middleware('role:responden');

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('role:admin');
Route::get('responden/{userid}', [AdminController::class, 'show_responden'])->name('show_responden')->middleware('role:admin');
Route::delete('responden/{userid}', [AdminController::class, 'responden_destroy'])->name('responden_destroy')->middleware('role:admin');
Route::get('export-excel', [AdminController::class, 'export_excel'])->name('export_excel')->middleware('role:admin');;

Route::get('questions', [AdminController::class, 'question'])->name('questions')->middleware('role:admin');
Route::put('questions/{id}', [AdminController::class, 'question_update'])->name('questions_update')->middleware('role:admin');
Route::delete('questions/{id}', [AdminController::class, 'question_destroy'])->name('question_destroy')->middleware('role:admin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister')->middleware('guest');
