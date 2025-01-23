<?php

use App\Views\Prompts\CreatePrompt;
use App\Views\Prompts\CreateRequest;
use App\Views\Prompts\ListPrompts;
use App\Views\Prompts\ShowPrompt;
use App\Views\Prompts\ShowRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', ListPrompts::class)->name('list-prompts');

Route::group(['prefix' => 'prompt'], function () {

    Route::get('/add', CreatePrompt::class)->name('create-prompt');

    Route::group(['prefix' => '/{prompt}'], function () {

        Route::get('/', ShowPrompt::class)->name('show-prompt');

        Route::group(['prefix' => 'request'], function () {

            Route::get('/create', CreateRequest::class)->name('create-prompt-request');

            Route::get('/{request}', ShowRequest::class)->name('show-prompt-request');

        });

    });
});

Route::group(['prefix' => 'fe'], function () {

    Route::get('/{request}', function () {
        return 'ypo';
    })->name('show-frontend-request');
});
