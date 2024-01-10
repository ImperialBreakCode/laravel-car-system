<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/car/{index}', [CarController::class, 'car']);