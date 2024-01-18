<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDolistController;

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

Route::get('/', [ToDolistController::class, 'showToDOList'])->name('showToDOList');
Route::post('insert-todolist', [ToDolistController::class, 'insertToDoList'])->name('insertToDoList');
Route::post('delete-todolist', [ToDolistController::class, 'deleteToDoList'])->name('deleteToDoList');
