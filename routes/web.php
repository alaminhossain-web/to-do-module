<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;



Route::get('/',[ToDoController::class,'index'])->name('home');
Route::resource('todos', ToDoController::class);
Route::patch('/todos/{id}/complete', [ToDoController::class, 'markComplete']);
