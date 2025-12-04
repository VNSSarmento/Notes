<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\Authication;
use App\Http\Middleware\NotAuth;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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
            Route::post('/create', [NoteController::class, 'create'])->name('notes.create');
            Route::delete('/destroy/{id}',[NoteController::class,'destroy'])->name('notes.delete');
            Route::get('/edit/{id}',[NoteController::class,'edit'])->name('notes.edit');
        });
    }
);
