<?php

use App\SectionManagement\Http\Controllers\SectionController;
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
Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);


Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/change-language/{lang?}', [App\Http\Controllers\AdminController::class, 'changeLanguage'])->name('change-language');


Route::resource('section', SectionController::class);
Route::get('/section/showBaseSection/{slug}', [SectionController::class, 'showBaseSection']);
Route::post('/section/setOrder', [SectionController::class, 'setOrder']);




