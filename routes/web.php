<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/view/{id}', [ProductController::class, 'show']);
Route::get('/create', [ProductController::class, 'create']);
Route::get('/delete/{id}', [ProductController::class, 'destroy']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('add', [ProductController::class, 'store']);
Route::post('update', [ProductController::class, 'update']);