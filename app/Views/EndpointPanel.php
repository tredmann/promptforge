<?php

namespace App\Views;

use App\Models\Prompt;
use App\Services\CreateEndpointService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class EndpointPanel extends Component
{
    public Prompt $prompt;

    public ?string $provider;

    public ?string $model;

    public ?string $name;

    public float $temperature = 0.5;

    public function mount(Prompt $prompt)
    {
        $this->prompt = $prompt;
    }

    public function render()
    {
        return view('components.endpoint-panel');
    }

    public function createEndpoint(CreateEndpointService $service)
    {
        $endpoint = $service->createEndpoint(
            prompt: $this->prompt,
            name: $this->name,
            provider: $this->provider,
            model: $this->model,
            temperature: $this->temperature
        );

        $this->reset('provider', 'model', 'name', 'temperature');

    }

    #[Computed]
    public function valid(): bool
    {

        return isset($this->model, $this->provider, $this->name);
    }

    #[Computed]
    public function providers(): array
    {
        return [
            'ollama',
        ];
    }

    #[Computed]
    public function models(): array
    {
        return [
            'phi4:latest',
            'gemma2:latest',
            'codestral:latest',
        ];
    }
}
