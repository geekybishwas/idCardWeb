<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdCardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});


// Route::resource('/admin',AdminController::class);

// Route::resource('/idCard',IdCardController::class);
Route::get('admin',[AdminController::class,'index'])->name('admin.index');


// Admin middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/idCard', [IdCardController::class, 'index'])->name('idCard.index'); 
    Route::get('/idCard/create', [IdCardController::class, 'create'])->name('idCard.create'); 
    Route::post('/idCard', [IdCardController::class, 'store'])->name('idCard.store'); 
    Route::get('/idCard/{idCard}', [IdCardController::class, 'show'])->name('idCard.show'); 
    Route::get('/idCard/{idCard}/edit', [IdCardController::class, 'edit'])->name('idCard.edit');
    Route::put('/idCard/{idCard}', [IdCardController::class, 'update'])->name('idCard.update'); 
    Route::delete('/idCard/{idCard}', [IdCardController::class, 'destroy'])->name('idCard.destroy'); 
});
Route::get('/generate-pdf/{id}',[PdfController::class,'generatePdf'])->name('print.pdf');


// User Login ,Register
Route::get('/login',[UserController::class,'loginForm'])->name('login.form');
Route::post('/login',[UserController::class,'loggedin'])->name('loggedin');
Route::get('/register',[UserController::class,'registerForm'])->name('register.form');
Route::post('/register',[UserController::class,'register'])->name('register');
Route::post('/logout',[UserController::class,'logout'])->name('logout');


//User 
Route::get('user/dashboard',[UserController::class,'index'])->name('user.index');