<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'GET /test OK';
});

Route::get('/backend', [BackendController::class, 'test']);
Route::get('/get', [BackendController::class, 'getAll']);
Route::get('/get/{id}', [BackendController::class, 'get']);
Route::post('/create', [BackendController::class, 'create']);
Route::put('/update/{id}', [BackendController::class, 'update']);
Route::delete('/delete/{id}', [BackendController::class, 'delete']);
