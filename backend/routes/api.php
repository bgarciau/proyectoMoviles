<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\plateController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\drinkController;
use App\Http\Controllers\SecurityAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/users', userController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/plates', plateController::class);
    Route::apiResource('/orders', orderController::class);
    Route::apiResource('/drinks', drinkController::class);
    Route::post('/logout', [SecurityAuthController::class, 'logout']);
});

// Route::middleware(['auth', 'role:cliente'])->group(function () {
//     Route::get('/plates', [plateController::class, 'index'])->name('plates.index');
//     Route::get('/drinks', [drinkController::class, 'index'])->name('drinks.index');
//     Route::post('/orders', [orderController::class, 'store'])->name('orders.store');
// });

// Route::middleware(['auth', 'role:mesero'])->group(function () {
//     Route::get('/plates', [plateController::class, 'index'])->name('plates.index');
//     Route::get('/drinks', [drinkController::class, 'index'])->name('drinks.index');
//     Route::post('/orders', [orderController::class, 'store'])->name('orders.store');
// });

Route::post('login', [SecurityAuthController::class, 'login'])->name('login');
Route::post('/registro', [userController::class, 'store'])->name('registro.store');