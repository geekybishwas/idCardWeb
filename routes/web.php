<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdCardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/admin',AdminController::class);

Route::resource('/idCard',IdCardController::class);
