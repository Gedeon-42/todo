<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

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

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [TodoController::class,'index'])->name('todos.index');
    Route::get('create', [TodoController::class,'create'])->name('todos.create');
    Route::post('create', [TodoController::class,'store']);
    Route::get('todos/{todo}/edit', [TodoController::class,'edit'])->name('todos.edit');
    Route::put('todos/{todo}', [TodoController::class,'update'])->name('todos.update');
    Route::delete('/todos/{todo}', [TodoController::class,'destroy'])->name('todos.destroy');
    Route::patch('/todos/{todo}/complete', [TodoController::class, 'complete'])
        ->name('todos.complete');
});