<?php

namespace App\Views;

use App\Models\Endpoint;
use App\Services\EndpointRequestService;
use Livewire\Component;

class FrontendEndpoint extends Component
{
    public Endpoint $endpoint;

    public array $inputs = [];

    private ?EndpointRequestService $endpointRequest = null;

    public mixed $answer = null;

    public array $allInputs = [];

    public function mount(Endpoint $endpoint): void
    {

        $this->endpoint = $endpoint;

        $this->endpointRequest = app(EndpointRequestService::class);

        $this->inputs = $this->endpointRequest->extractInputs($endpoint->prompt->prompt);
    }

    public function performRequest(): void
    {

        // reset the answer
        $this->answer = null;

        $this->endpointRequest = app(EndpointRequestService::class);

        $this->answer = $this->endpointRequest->endpoint(
            endpoint: $this->endpoint,
            inputs: $this->allInputs
        );
    }

    public function render()
    {
        return view('components.frontend-endpoint')
            ->extends('components.layouts.app')
            ->title($this->endpoint->prompt->title);
    }
}
