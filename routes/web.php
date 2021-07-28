<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'login'])->name('home');
Route::post('ipn', [LoadController::class, 'ipn']);
Route::post('login', [LoadController::class, 'authentication'])->name('login');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('home', [PagesController::class, 'home'])->name('user.home');
    Route::get('logout', [LoadController::class, 'logout'])->name('user.logout');
});
