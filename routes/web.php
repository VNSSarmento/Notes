<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Middleware\Authication;
use App\Http\Middleware\NotAuth;
use Illuminate\Support\Facades\Route;

Route::middleware([NotAuth::class])->group(
    function () {
        Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login');
        Route::get('/login', [AuthController::class, 'login']);
    }
);

Route::middleware([ Authication::class])->group(
    function () {
        Route::get('/', [MainController::class, 'index'])->name('home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        //edit note
        
        Route::prefix('notes')->group(function(){
            Route::post('/create', [NoteController::class, 'store'])->name('notes.store');
            Route::delete('/destroy/{id}',[NoteController::class,'destroy'])->name('notes.delete');
            Route::get('/edit/{id}',[NoteController::class,'edit'])->name('notes.edit');
            Route::put('/update/{id}',[NoteController::class,'update'])->name('notes.update');
            Route::get('/show/{id}',[NoteController::class,'show'])->name('notes.show');
        });
    }
);
