<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\TruyenController;
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

Route::get('/', [IndexController::class, 'home']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);

Route::get('/doc-truyen/{slug}', [IndexController::class, 'doctruyen']);
Route::get('/doc-chapter/{slug}', [IndexController::class, 'docchapter']);

Route::get('/tim-kiem', [IndexController::class, 'timkiem']);
Route::get('search-typehead/action', [IndexController::class, 'search']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuctruyen', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);
