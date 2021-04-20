<?php

use App\Http\Controllers\ImageController;
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

Route::get('/', [ImageController::class, 'show'])->name('gallery');

Route::get('images', [ ImageController::class, 'index' ]);
Route::get('search', [ ImageController::class, 'search' ])->name('search');
Route::post('images', [ ImageController::class, 'store' ])->name('images.store');
