<?php

use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('news', NewsController::class);


