<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::group(['prefix' => 'meals'], function() {
        Route::get('/', [MealController::class, 'index'])->name('meals.index');
        Route::post('/', [MealController::class, 'store'])->name('meals.store');
        Route::get('/create', [MealController::class, 'create'])->name('meals.create');
        Route::get('/{meal}', [MealController::class, 'show'])->name('meals.show');
        Route::delete('/{meal}', [MealController::class, 'destroy'])->name('meals.destroy');
        Route::patch('/close', [MealController::class, 'closeRegistration'])->name('meals.closeRegistration');
    });
});

Route::group(['prefix' => 'meals', 'middleware' => ['auth.consumer']], function () {
    Route::get('/{registrationCode}', [MealController::class, 'dashboard'])->name('meals.registration.dashboard');
    Route::post('/{registrationCode}', [OrderController::class, 'store'])->name('meals.register.order');
    Route::put('/{registrationCode}', [OrderController::class, 'update'])->name('meals.update.order');
});

