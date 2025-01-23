<?php

namespace App\Views;

use App\Enums\RequestState;
use App\Jobs\ChatRequest;
use App\Models\Prompt;
use Livewire\Component;

class RequestPanel extends Component
{
    public Prompt $prompt;

    public ?string $provider = null;

    public ?string $model = null;

    public ?float $temperature = .5;

    public function submitRequest(): void
    {
        $data = [
            'state' => RequestState::Queued,
            'provider' => $this->provider,
            'model' => $this->model,
            'temperature' => $this->temperature,
            'prompt_text' => $this->prompt->prompt, // substitutions
            'response_type' => $this->prompt->response_type,
            'response_schema' => $this->prompt->response_schema,
            'started_at' => now(),
        ];

        $request = $this->prompt->requests()->create($data);

        ChatRequest::dispatch($request);

        $this->reset('model', 'provider', 'temperature');

    }

    public function render()
    {
        return view('components.request-panel');
    }
}
