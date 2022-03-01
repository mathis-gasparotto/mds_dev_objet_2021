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

Route::get('/users', [Users::class, 'index'])->name('users.index');

Route::get('/users/create', [Users::class, 'create'])->name('users.create');

Route::post('/users', [Users::class, 'store'])->name('users.store');

Route::get('/users/{user}/edit', [Users::class, 'edit'])->name('users.edit');

Route::post('/users/{user}/edit', function () {
    $user_edit = new App\Models\User;
    $user_edit->name = request('name');
    $user_edit->email = request('email');
    $user_edit->avatar_url = request('avatar_url');
    DB::table('users')
        ->where('id', $user)
        ->update([
                'name' => $user_edit->name,
                'email' => $user_edit->email,
                'avatar_url' => $user_edit->avatar_url,
            ]);

    echo "<p>User updated</p>";
    return "<a href='http://127.0.0.1:8000/users'>User List</a>";
})->name('users.edit.post');

Route::get('/users/{user}/del', [Users::class, 'destroy'])->name('users.del');

Route::get('/users/{user}', [Users::class, 'show'])->name('users.show');
