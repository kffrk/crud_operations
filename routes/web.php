<?php

use App\Http\Controllers\App\AuthController;
use App\Http\Controllers\App\ClubController;
use App\Http\Controllers\App\IndexController;
use App\Http\Controllers\App\LeagueController;
use App\Http\Controllers\App\PlayerController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');;
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::get('/leagues', [LeagueController::class, 'index'])->name('league');
    Route::middleware('can:leagues')->group(function () {
        Route::get('/leagues/add', [LeagueController::class, 'add'])->name('league.add');
        Route::post('/leagues/create', [LeagueController::class, 'create'])->name('league.create');
        Route::get('/leagues/edit/{id}', [LeagueController::class, 'edit'])->name('league.edit');
        Route::put('/leagues/update/{id}', [LeagueController::class, 'update'])->name('league.update');
        Route::get('/leagues/delete/{id}', [LeagueController::class, 'delete'])->name('league.delete');
    });

    Route::get('/clubs', [ClubController::class, 'index'])->name('club');
    Route::middleware('can:clubs')->group(function () {
        Route::get('/clubs/add', [ClubController::class, 'add'])->name('club.add');
        Route::post('/clubs/create', [ClubController::class, 'create'])->name('club.create');
        Route::get('/clubs/edit/{id}', [ClubController::class, 'edit'])->name('club.edit');
        Route::put('/clubs/update/{id}', [ClubController::class, 'update'])->name('club.update');
        Route::get('/clubs/delete/{id}', [ClubController::class, 'delete'])->name('club.delete');
    });

    Route::get('/players', [PlayerController::class, 'index'])->name('player');
    Route::middleware('can:players')->group(function () {
        Route::get('/players/add', [PlayerController::class, 'add'])->name('player.add');
        Route::post('/players/create', [PlayerController::class, 'create'])->name('player.create');
        Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('player.edit');
        Route::put('/players/update/{id}', [PlayerController::class, 'update'])->name('player.update');
        Route::get('/players/delete/{id}', [PlayerController::class, 'delete'])->name('player.delete');
    });
});
