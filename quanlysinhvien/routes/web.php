<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\HomeController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\LopMonHocController;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});
//Route::get('/user','App\Http\Controllers\UserController@index');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login',[LoginController::class,'login']);
//quanlysinhvien
Route::middleware('auth')->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('admin');
    Route::prefix('/admin/lop/')->group(function () {
        Route::prefix('add')->group(function () {
            Route::get('/',[LopMonHocController::class,'create']);
            Route::post('/store',[LopMonHocController::class,'store']);
        });
        Route::get('/',[LopMonHocController::class,'index']);
        Route::get('/edit/{lop}',[LopMonHocController::class,'edit']);
        Route::post('/edit/postedit/{id}',[LopMonHocController::class,'postedit']);
        Route::DELETE('/delete',[LopMonHocController::class,'delete']);
    });
});