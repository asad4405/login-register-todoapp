<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[FrontendController::class, 'index'])->name('index');

Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('todo',TodoController::class)->middleware('auth');
Route::get('/todo/restore/{id}', [TodoController::class, 'todo_restore'])->name('todo.restore')->middleware('auth');
Route::get('/todo/empty/{id}', [TodoController::class, 'todo_empty'])->name('todo.empty')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
