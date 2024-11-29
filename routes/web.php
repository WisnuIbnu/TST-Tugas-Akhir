<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('siswa',[SiswaController::class,'index']);
Route::post('siswa',[SiswaController::class,'store']);
Route::get('siswa/{id}',[SiswaController::class,'edit']);
Route::put('siswa/{id}',[SiswaController::class,'update']);
Route::delete('siswa/{id}',[SiswaController::class,'destroy']);