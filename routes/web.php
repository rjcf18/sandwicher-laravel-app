<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'consumers'], function() {
    Route::get('/', [ConsumerController::class, 'index'])->name('consumers.index');
    Route::post('/', [ConsumerController::class, 'store'])->name('consumers.store');
    Route::get('/create', [ConsumerController::class, 'create'])->name('consumers.create');
    Route::get('/{consumer}', [ConsumerController::class, 'show'])->name('consumers.show');
    Route::post('/{consumer}', [ConsumerController::class, 'destroy'])->name('consumers.destroy');
});

Route::group(['prefix' => 'meals'], function() {
    Route::get('/', [MealController::class, 'index'])->name('meals.index');
    Route::post('/', [MealController::class, 'store'])->name('meals.store');
    Route::get('/create', [MealController::class, 'create'])->name('meals.create');
    Route::get('/{consumer}', [MealController::class, 'show'])->name('meals.show');
    Route::post('/{consumer}', [MealController::class, 'destroy'])->name('meals.destroy');
    Route::patch('/close', [MealController::class, 'closeRegistration'])->name('meals.closeRegistration');
});
