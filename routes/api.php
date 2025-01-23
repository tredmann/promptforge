<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/endpoint/{endpoint}', [ApiController::class, 'endpoint'])
    ->name('api-endpoint')
    ->middleware(\App\Http\Middleware\Json::class);
