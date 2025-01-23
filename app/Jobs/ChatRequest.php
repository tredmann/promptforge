<?php

namespace App\Jobs;

use App\Enums\RequestState;
use App\Models\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
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
        $this->request->update(['state' => RequestState::Pending]);

        $provider = $this->request->provider;
        $model = $this->request->model;
        $prompt = $this->request->prompt_text;
        $temperature = $this->request->temperature;

        $type = Type::Ollama;

        $llm = LLM::make($type);

        $answer = $llm->completion(model: $model, prompt: $prompt, temperature: $temperature);

        $this->request->response()->create([
            'response' => $answer,
        ]);

        $this->request->update([
            'finished_at' => now(),
            'state' => RequestState::Succeeded,
        ]);

    }
}
