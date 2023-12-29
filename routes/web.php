<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TaskController;
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
    return redirect()->route('login');
});

Auth::routes([
    'register' => true,
    'reset' => true,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/task', [TaskController::class, 'index'])->name('task.index');


Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('store', [BookController::class, 'store'])->name('store');
    Route::get('/{book}/show', [BookController::class, 'show'])->name('show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit'); //if get don have to hide
    Route::put('/{book}/update', [BookController::class, 'update'])->name('update');
    Route::delete('/{book}/destroy', [BookController::class, 'destroy'])->name('destroy'); //put, delete sama dengan post need to hide the new data input  
});

    Route::group(['prefix' => 'task', 'as' => 'task.'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('index');
        Route::get('/create', [TaskController::class, 'create'])->name('create');
        Route::post('store', [TaskController::class, 'store'])->name('store');
        Route::get('/{task}/show', [TaskController::class, 'show'])->name('show');
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
        Route::put('/{task}/update', [TaskController::class, 'update'])->name('update');
        Route::delete('/{task}/destroy', [TaskController::class, 'destroy'])->name('destroy');
});
