<?php

Route::prefix('developer')->as('developer.')->group(function () {

    Route::get('/login', [\App\Http\Controllers\Developer\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Developer\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Developer\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:developer')->group(function () {
        Route::get('/', [\App\Http\Controllers\Developer\HomeController::class, 'index'])->name('home');

        Route::resource('project', \App\Http\Controllers\Developer\ProjectController::class);
    });

    Route::get('xcsrf-token-excepts', [\App\Http\Controllers\Developer\Auth\LoginController::class, 'return']);

});
