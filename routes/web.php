<?php

use App\Http\Controllers\TaskController;
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

Route::prefix('/task')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::post('/create', [TaskController::class, 'create'])->name('task.create');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});
