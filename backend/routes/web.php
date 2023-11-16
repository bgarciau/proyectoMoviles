<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userWebController;
use App\Http\Controllers\plateWebController;
use App\Http\Controllers\orderWebController;
use App\Http\Controllers\drinkWebController;
use App\Http\Controllers\roleController;
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
    Route::get('/role', [roleController::class, 'index'])->name('role.index');
    Route::POST('/role', [roleController::class, 'store'])->name('role.store');
    Route::get("role/{id}", [roleController::class, 'edit'])->name('role.edit');
    Route::put("role/{id}", [roleController::class, 'update'])->name('role.update');
    Route::delete("role/{id}", [roleController::class, 'destroy'])->name('role.destroy');
    Route::get('/users', [userWebController::class, 'index'])->name('users.index');
    Route::POST('/users', [userWebController::class, 'store'])->name('users.store');
    Route::get("users/{id}", [userWebController::class, 'edit'])->name('users.edit');
    Route::put("users/{id}", [userWebController::class, 'update'])->name('users.update');
    Route::delete("users/{id}", [userWebController::class, 'destroy'])->name('users.destroy');
    Route::get('/plates', [plateWebController::class, 'index'])->name('plates.index');
    Route::POST('/plates', [plateWebController::class, 'store'])->name('plates.store');
    Route::get("plates/{id}", [plateWebController::class, 'edit'])->name('plates.edit');
    Route::put("plates/{id}", [plateWebController::class, 'update'])->name('plates.update');
    Route::delete("plates/{id}", [plateWebController::class, 'destroy'])->name('plates.destroy');
    Route::get('/drinks', [drinkWebController::class, 'index'])->name('drinks.index');
    Route::POST('/drinks', [drinkWebController::class, 'store'])->name('drinks.store');
    Route::get("drinks/{id}", [drinkWebController::class, 'edit'])->name('drinks.edit');
    Route::put("drinks/{id}", [drinkWebController::class, 'update'])->name('drinks.update');
    Route::delete("drinks/{id}", [drinkWebController::class, 'destroy'])->name('drinks.destroy');
    Route::get('/orders', [orderWebController::class, 'index'])->name('orders.index');
    Route::POST('/orders', [orderWebController::class, 'store'])->name('orders.store');
    Route::get("orders/{id}", [orderWebController::class, 'edit'])->name('orders.edit');
    Route::put("orders/{id}", [orderWebController::class, 'update'])->name('orders.update');
    Route::delete("orders/{id}", [orderWebController::class, 'destroy'])->name('orders.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

