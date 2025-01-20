<?php

namespace App\Jobs;

use App\Models\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ChatRequest implements ShouldQueue
{
    use Queueable;

    public function __construct(public Request $request)
    {
        //
    }

    public function handle(): void
    {
        Log::debug('handle');
    }
}
