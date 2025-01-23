<?php

namespace App\Services;

use App\Enums\RequestState;
use App\Jobs\ChatRequest;
use App\Models\Prompt;
use App\Models\Request;

class CreateRequestService
{
    public function create(Prompt $prompt, string $provider, string $model, float $temperature): Request
    {

        $data = [
            'state' => RequestState::Queued,
            'provider' => $provider,
            'model' => $model,
            'temperature' => $temperature,
            'prompt_text' => $prompt->prompt, // substitutions
            'response_type' => $prompt->response_type,
            'response_schema' => $prompt->response_schema,
            'started_at' => now(),
        ];

        $request = $prompt->requests()->create($data);

        ChatRequest::dispatch($request);

        return $request;

    }
}
