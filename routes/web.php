<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/docente', function () {
    return view('docente.index');
});

Route::get('/docente/create', [DocenteController:: class,'create']);
*/

//con esta instrucción se puede ingrear a todas las URL
Route::resource('docente',DocenteController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [DocenteController::class, 'index'])->name('home');

Route::group(['middleware' =>'auth'], function (){

    Route::get('/', [DocenteController::class, 'index'])->name('home');
});


