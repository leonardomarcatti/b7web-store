<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;

Route::controller(PagesController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/myProfile', 'myProfile')->name('myProfile');
        Route::get('/myAds', 'myAds')->name('myAds');
        Route::get('/myAds/delete/{id}', 'deleteAd')->name('deleteAd');
    });
    Route::get('/ad/{slug}', 'adDetails')->name('adDetails');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/saveRegister', 'saveRegister')->name('saveRegister');
    Route::get('/login', 'login')->name('login');
    Route::get('/forgotPassword', 'forgotPassword')->name('forgotPassword');
    Route::post('/loginAction', 'loginAction')->name('loginAction');
    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/update', 'update')->name('update');
    });
});
