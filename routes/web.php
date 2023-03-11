<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ResponseteachController;

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

//My page(生徒用)
Route::get('/mypagestu', 'App\Http\Controllers\MessageController@mypagestu')->name('mypagestu');

//message CRUD処理
Route::resource('message', MessageController::class);

Route::get('/checkqr', 'App\Http\Controllers\MessageController@checkqr')->name('checkqr');

Route::post('/message/store', 'App\Http\Controllers\MessageController@store')->name('store');
//message check
Route::get('/check', 'App\Http\Controllers\MessageController@check')->name('check');

//response CRUD処理
Route::resource('response', ResponseController::class);

//response check
Route::get('/checkres', 'App\Http\Controllers\ResponseController@checkres')->name('checkres');

//My page(先生用)
Route::get('/mypageteach', 'App\Http\Controllers\ResponseteachController@mypageteach')->name('mypageteach');

//response（先生から） CRUD処理
Route::resource('responseteach', ResponseteachController::class);

//response check（先生から）
Route::get('/checkresteach', 'App\Http\Controllers\ResponseteachController@checkresteach')->name('checkresteach');


//ログイン
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//ログアウト処理
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');