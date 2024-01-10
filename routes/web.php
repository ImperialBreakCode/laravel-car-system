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
use App\Http\Controllers\ManufacturerController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/cars', [CarController::class, 'index']);
Route::get('/car/{index}', [CarController::class, 'car']);

Route::get('/manufacturers', [ManufacturerController::class, 'index']);
Route::get('/manufacturer/{slug}', [ManufacturerController::class, 'manufacturer']);
