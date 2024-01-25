<?php

use Illuminate\Support\Facades\Route;

require_once 'guard/admin.php';
require_once 'guard/developer.php';
require_once 'guard/customer.php';

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
