<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);


