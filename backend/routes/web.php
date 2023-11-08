<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userWebController;
use App\Http\Controllers\plateWebController;
use App\Http\Controllers\orderWebController;
use App\Http\Controllers\drinkWebController;
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
    Route::get('/users', [userWebController::class, 'index'])->name('users.index');
    Route::POST('/users', [userWebController::class, 'store'])->name('users.store');
    Route::get("users/{id}", [userWebController::class, 'edit'])->name('users.edit');
    Route::put("users/{id}", [userWebController::class, 'update'])->name('users.update');
    Route::delete("users/{id}", [userWebController::class, 'destroy'])->name('users.destroy');
    Route::get('/plates', [plateWebController::class, 'index'])->name('plates.index');
    Route::put("plates/{id}", [plateWebController::class, 'update'])->name('plates.update');
    Route::delete("plates/{id}", [plateWebController::class, 'destroy'])->name('plates.destroy');
    Route::get('/drinks', [drinkWebController::class, 'index'])->name('drinks.index');
    Route::POST('/drinks', [drinkWebController::class, 'store'])->name('drinks.store');
    Route::put("drinks/{id}", [drinkWebController::class, 'update'])->name('drinks.update');
    Route::delete("drinks/{id}", [drinkWebController::class, 'destroy'])->name('drinks.destroy');
    Route::get('/orders', [orderWebController::class, 'index'])->name('orders.index');
    Route::POST('/orders', [orderWebController::class, 'store'])->name('orders.store');
    Route::put("orders/{id}", [orderWebController::class, 'update'])->name('orders.update');
    Route::delete("orders/{id}", [orderWebController::class, 'destroy'])->name('orders.destroy');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/plates', [plateWebController::class, 'index'])->name('plates.index');
    Route::get('/drinks', [drinkWebController::class, 'index'])->name('drinks.index');
    Route::post('/orders', [orderWebController::class, 'store'])->name('orders.store');
});

Route::middleware(['auth', 'role:mesero'])->group(function () {
    Route::get('/plates', [plateWebController::class, 'index'])->name('plates.index');
    Route::get('/drinks', [drinkWebController::class, 'index'])->name('drinks.index');
    Route::post('/orders', [orderWebController::class, 'store'])->name('orders.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

