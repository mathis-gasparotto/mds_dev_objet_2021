<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('index');


Route::get('/auth/redirect', [UserController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/callback', [UserController::class, 'auth'])->name('auth.callback');
Route::post('/auth/callback', [UserController::class, 'register'])->name('auth.register');

