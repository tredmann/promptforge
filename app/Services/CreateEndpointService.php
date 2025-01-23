<?php

namespace App\Services;

use App\Models\Endpoint;
use App\Models\Prompt;

class CreateEndpointService
{
    public function createEndpoint(Prompt $prompt, string $name, string $provider, string $model, float $temperature): Endpoint
    {

        $data = [
            'name' => $name,
            'provider' => $provider,
            'model' => $model,
            'temperature' => $temperature,
        ];

        $endpoint = $prompt->endpoints()->create($data);

        return $endpoint;
    }
}
