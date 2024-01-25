<?php

Route::prefix('customer')->as('customer.')->group(function () {

    Route::get('/login', [\App\Http\Controllers\Customer\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Customer\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Customer\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:customer')->group(function () {
        Route::get('/', [\App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');

        Route::resource('project', \App\Http\Controllers\Customer\ProjectController::class);
    });

    Route::get('xcsrf-token-excepts', [\App\Http\Controllers\Customer\Auth\LoginController::class, 'return']);

});
