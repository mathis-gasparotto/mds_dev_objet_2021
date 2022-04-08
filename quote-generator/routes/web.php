<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MissionLinesController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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

Route::middleware('auth')->group(function () {

    Route::get('/register', [LoginController::class, 'register'])->name('auth.register');
    Route::put('/register', [LoginController::class, 'registration'])->name('auth.registration');

    Route::middleware('registration')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

        Route::resource('clients', ClientsController::class);

        Route::get('/account', [UserController::class, 'show'])->name('user.show');
        Route::get('/account/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/account/edit', [UserController::class, 'update'])->name('user.update');
        Route::get('/account/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::delete('/account/delete', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/client/{client}/missions', [MissionsController::class, 'index'])->name('missions.index');
        Route::get('/client/{client}/missions/create', [MissionsController::class, 'create'])->name('missions.create');
        Route::post('/client/{client}/missions/create', [MissionsController::class, 'store'])->name('missions.store');
        Route::get('/mission/{mission}/edit', [MissionsController::class, 'edit'])->name('missions.edit');
        Route::put('/mission/{mission}/edit', [MissionsController::class, 'update'])->name('missions.update');
        Route::delete('/mission/{mission}/delete', [MissionsController::class, 'destroy'])->name('missions.destroy');

        Route::get('/mission/{mission}/mission_lines', [MissionLinesController::class, 'index'])->name('missionLines.index');
        Route::get('/mission/{mission}/mission_lines/create', [MissionLinesController::class, 'create'])->name('missionLines.create');
        Route::post('/mission/{mission}/mission_lines/create', [MissionLinesController::class, 'store'])->name('missionLines.store');
        Route::get('/mission_line/{missionLine}/edit', [MissionLinesController::class, 'edit'])->name('missionLines.edit');
        Route::put('/mission_line/{missionLine}/edit', [MissionLinesController::class, 'update'])->name('missionLines.update');
        Route::delete('/mission_line/{missionLine}/delete', [MissionLinesController::class, 'destroy'])->name('missionLines.destroy');

        Route::get('/mission/{mission}/quote', [MissionsController::class, 'showQuote'])->name('quote.show');
    });

});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::get('/auth/redirect', [LoginController::class, 'redirect'])->name('auth.redirect');
    Route::get('/auth/callback', [LoginController::class, 'auth'])->name('auth.callback');
    //Route::post('/auth/callback', [LoginController::class, 'register'])->name('auth.register');
});
