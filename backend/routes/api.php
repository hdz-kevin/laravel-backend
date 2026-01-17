<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\QueriesController;
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

// Rutas para probrar Queries con Eloquent
Route::get('/querie', [QueriesController::class, 'get']);
Route::get('/querie/{id}', [QueriesController::class, 'getById']);
Route::get('/querie/method/names', [QueriesController::class, 'getNames']);
Route::get('/querie/method/search/{name}/{price}', [QueriesController::class, 'searchName']);
Route::get('/querie/method/searchString/{value}', [QueriesController::class, 'searchString']);
