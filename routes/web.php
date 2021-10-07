<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('estudiante', EstudianteController::class);
Route::resource('profesor', ProfesorController::class);

Auth::routes();

Route::get('/home', [EstudianteController::class, 'index'])->name('home');

Route::group(['middlware' => 'auth'],function (){
    Route::get('/home', [EstudianteController::class, 'index'])->name('home');
});