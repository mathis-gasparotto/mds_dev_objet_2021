<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\PasswordControler;
use App\Http\Controllers\Users;
use App\Http\Middleware\Authenticate;
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
});

/*
    Route::get('/users', [Users::class, 'index'])->name('users.index');
    Route::get('/users/create', [Users::class, 'create'])->name('users.create');
    Route::post('/users', [Users::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [Users::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}/delete', [Users::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [Users::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [Users::class, 'show'])->name('users.show');
    ==> Route::resource('users', Users::class);
    */

Route::resource('users', Users::class)->middleware(Authenticate::class);

Route::get('/login', [Login::class, 'login'])->name('auth.login');
Route::post('/login', [Login::class, 'authenticate'])->name('auth.authenticate');
Route::get('/register', [Login::class, 'register'])->name('auth.register');
Route::post('/register', [Login::class, 'registration'])->name('auth.registration');
Route::get('/logout', [Login::class, 'logout'])->name('auth.logout');

Route::get('/password', [PasswordControler::class, 'forgotten'])->name('password.forgotten');
Route::post('/password', [PasswordControler::class, 'sendEmail'])->name('password.sendEmail');
Route::get('/password/reset/{token}', [PasswordControler::class, 'reset'])->name('password.reset');
Route::post('/password/reset/{token}', [PasswordControler::class, 'update'])->name('password.update');
