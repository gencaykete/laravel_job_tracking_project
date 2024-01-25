<?php

Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        Route::resource('developer', \App\Http\Controllers\Admin\DeveloperController::class);
        Route::resource('customer', \App\Http\Controllers\Admin\CustomerController::class);
        Route::resource('project', \App\Http\Controllers\Admin\ProjectController::class);
        Route::get('project/{project}/status/{status}/change', [\App\Http\Controllers\Admin\ProjectController::class, 'changeProjectStatus'])->name('project.status.change');
        Route::resource('project-developer', \App\Http\Controllers\Admin\ProjectDeveloperController::class);
        Route::resource('project-developer-payment', \App\Http\Controllers\Admin\ProjectDeveloperPaymentController::class);
        Route::resource('project-customer-payment', \App\Http\Controllers\Admin\ProjectCustomerPaymentController::class);


        Route::controller(\App\Http\Controllers\Admin\SettingController::class)->as('setting.')->group(function () {
            Route::get('setting/global', 'global')->name('global');
            Route::get('setting/order', 'order')->name('order');

            Route::put('setting/update', 'update')->name('update');
        });

    });

});
