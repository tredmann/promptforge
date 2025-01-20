<?php

use App\Views\Prompts\CreatePrompt ;
use App\Views\Prompts\ListPrompts;
use App\Views\Prompts\ShowPrompt;
use Illuminate\Support\Facades\Route;

Route::get('/', ListPrompts::class)->name('list-prompts');

Route::group(['prefix' => 'prompt'], function () {

    Route::get('/add', CreatePrompt::class)->name('create-prompt');

    Route::group(['prefix' => '/{prompt}'], function () {

        Route::get('/', ShowPrompt::class)->name('show-prompt');

    });
});


Route::group(['prefix' => 'fe'], function () {

    Route::get('/{request}', function() {
        return 'ypo';
    } )->name('show-frontend-request');
});