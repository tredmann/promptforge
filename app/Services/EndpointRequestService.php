<?php

namespace App\Services;

use App\Models\Endpoint;
use Illuminate\Support\Str;
use LLM\Enums\Type;
use LLM\LLM;

class EndpointRequestService
{
    // public function __construct(private CreateRequestService $createRequestService) {}

    public function endpoint(Endpoint $endpoint, array $inputs)
    {

        $promptText = $endpoint->prompt->prompt;

        foreach ($inputs as $inputKey => $inputValue) {
            $promptText = Str::replace('['.$inputKey.']', $inputValue, $promptText);
        }

        // better way

        $type = Type::Ollama;
        $llm = LLM::make($type);

        $answer = $llm->completion(
            model: $endpoint->model,
            prompt: $promptText,
            temperature: $endpoint->temperature,
            format: $endpoint->prompt->response_type,
        );

        return $answer;

    }

    public function extractInputs(string $text): array
    {
        return Str::matchAll('/\[([a-zA-Z][^\]]*[a-zA-Z])\]/', $text)->toArray();
    }
}
