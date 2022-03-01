<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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
    dump(\App\Models\User::all());
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

Route::resource('users', Users::class);
