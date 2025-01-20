<?php

namespace App\Jobs;

use App\Models\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use LLM\Enums\Type;
use LLM\LLM;

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

        $provider = $this->request->provider;
        $model = $this->request->model;

        $prompt = $this->request->prompt->prompt;

        $type = Type::Ollama;

        $llm = LLM::make($type);

        $answer = $llm->completion(model: $model, prompt: $prompt, temperature: .4);

        Log::debug('answer: '.$answer);
    }
}
