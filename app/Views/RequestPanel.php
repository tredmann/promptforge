<?php

namespace App\Views;

use App\Jobs\ChatRequest;
use App\Models\Prompt;
use App\Models\Request;
use Livewire\Component;

class RequestPanel extends Component
{
    public Prompt $prompt;

    public ?string $provider = null;

    public ?string $model = null;

    public function add(): void
    {
        $data = [
            'provider' => $this->provider,
            'model' => $this->model,
            'has_frontend' => true,
            'has_api' => true,
        ];

        $request = $this->prompt->requests()->create($data);

        $this->reset('model', 'provider');

    }

    public function dispatchJob(string $requestId): void
    {
        ChatRequest::dispatch(Request::find($requestId));
    }

    public function render()
    {
        return view('components.request-panel');
    }
}
