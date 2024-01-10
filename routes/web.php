<?php

use App\Http\Controllers\ModelController;
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

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');;
Route::get('/cars/search', [CarController::class, 'search'])->name('cars.search');
Route::get('/car/{index}', [CarController::class, 'car']);

Route::get('/manufacturers', [ManufacturerController::class, 'index']);
Route::get('/manufacturer/{slug}', [ManufacturerController::class, 'manufacturer']);

Route::get('/models', [ModelController::class, 'index']);
Route::get('/model/{slug}', [ModelController::class, 'model']);
