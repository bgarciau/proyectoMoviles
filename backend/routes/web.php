<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\plateController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\drinkController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/users', [userController::class, 'store'])->name('users.store');
    Route::POST('/users', [userController::class, 'store'])->name('users.store');
    Route::put("users/{id}", [userController::class, 'update'])->name('users.update');
    Route::delete("users/{id}", [userController::class, 'destroy'])->name('users.destroy');
    Route::get('/plates', [plateController::class, 'index'])->name('plates.index');
    Route::POST('/plates', [plateController::class, 'store'])->name('plates.store');
    Route::put("plates/{id}", [plateController::class, 'update'])->name('plates.update');
    Route::delete("plates/{id}", [plateController::class, 'destroy'])->name('plates.destroy');
    Route::get('/drinks', [drinkController::class, 'index'])->name('drinks.index');
    Route::POST('/drinks', [drinkController::class, 'store'])->name('drinks.store');
    Route::put("drinks/{id}", [drinkController::class, 'update'])->name('drinks.update');
    Route::delete("drinks/{id}", [drinkController::class, 'destroy'])->name('drinks.destroy');
    Route::post('/orders', [orderController::class, 'store'])->name('orders.store');
    Route::POST('/orders', [orderController::class, 'store'])->name('orders.store');
    Route::put("orders/{id}", [orderController::class, 'update'])->name('orders.update');
    Route::delete("orders/{id}", [orderController::class, 'destroy'])->name('orders.destroy');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/plates', [plateController::class, 'index'])->name('plates.index');
    Route::get('/drinks', [drinkController::class, 'index'])->name('drinks.index');
    Route::post('/orders', [orderController::class, 'store'])->name('orders.store');
});

Route::middleware(['auth', 'role:mesero'])->group(function () {
    Route::get('/plates', [plateController::class, 'index'])->name('plates.index');
    Route::get('/drinks', [drinkController::class, 'index'])->name('drinks.index');
    Route::post('/orders', [orderController::class, 'store'])->name('orders.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
