<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BienImmobilierController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\SpecificityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SecurityController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/', [HomepageController::class, 'index'])
    ->name('homepage.index');
Route::get('/annonces', [\App\Http\Controllers\PropertyController::class, 'index'])
    ->name('property.index');
Route::get('/annonces/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])
    ->where([
        'property' => $idRegex,
        'slug' => $slugRegex
    ])
    ->name('property.show');

Route::post('/annonces/{property}/contact', [\App\Http\Controllers\PropertyController::class, 'contact'])
    ->where([
        'property' => $idRegex
    ])
    ->name('property.contact');

Route::prefix('admin')
    //->controller(PropertyController::class)
    ->name('admin.')
    ->group(function (){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('bien', BienImmobilierController::class)->except(['show']);
        Route::resource('specificity', SpecificityController::class)->except(['show']);
        Route::resource('user', UserController::class)->except(['show']);
        Route::resource('property', PropertyController::class)->except(['show']);
        Route::resource('option', OptionController::class)->except(['show']);
    });



Route::get('/login', [SecurityController::class, 'login'])->middleware('guest')->name('security.login');
