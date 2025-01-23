<?php

namespace App\Views\Prompts;

use App\Models\Prompt;
use App\Services\CreateRequestService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateRequest extends Component
{
    public Prompt $prompt;

    public string $provider = 'ollama';

    public string $model;

    public float $temperature = 0.5;

    public function create(CreateRequestService $service)
    {
        $request = $service->create(
            prompt: $this->prompt,
            provider: $this->provider,
            model: $this->model,
            temperature: $this->temperature
        );

        $this->redirect(route('show-prompt-request', ['request' => $request, 'prompt' => $this->prompt]));
    }

    public function mount(Prompt $prompt)
    {
        $this->prompt = $prompt;
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
        ];
    }

    public function render()
    {
        return view('components.prompts.create-request')
            ->extends('components.layouts.app')
            ->title('Create Request for '.$this->prompt->title);
    }
}
