<?php

namespace App\Providers;

use App\Jobs\ChatRequest;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Queue::before(function (JobProcessing $event) {

            if ($event->job->resolveName() === ChatRequest::class) {
                Log::info('We have a chat request');
            }
        });

        Queue::after(function (JobProcessed $event) {
            Log::debug($event->job->getName());
        });

        Queue::failing(function (JobFailed $event) {
            Log::debug($event->job->getName());
        });
    }
}
