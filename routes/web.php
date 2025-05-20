<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SecurityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');

Route::prefix('admin')
    //->controller(PropertyController::class)
    ->name('admin.')
    ->group(function (){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('property', PropertyController::class)->except(['show']);
        Route::resource('option', OptionController::class)->except(['show']);
    });



Route::get('/login', [SecurityController::class, 'login'])->middleware('guest')->name('security.login');
