<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [PagesController::class, 'artikel']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storelogin'])->name('storelogin');

Route::post('/submitkomentar', [PagesController::class, 'submitcomment'])->name('submitkomentar');
Route::get('/artikel/{id}', [PagesController::class, 'selengkapnya'])->name('selengkapnya');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/listartikel', [PagesController::class, 'listartikel'])->name('listartikel');
    Route::post('/postartikel', [PagesController::class, 'postartikel'])->name('postartikel');
    Route::post('/editartikel/{id}', [PagesController::class, 'editartikel'])->name('editartikel');
    Route::post('/deleteartikel/{id}', [PagesController::class, 'deleteartikel'])->name('deleteartikel');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});