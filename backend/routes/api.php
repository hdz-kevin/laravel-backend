<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'GET /test OK';
});

Route::get('/backend', [BackendController::class, 'get']);
