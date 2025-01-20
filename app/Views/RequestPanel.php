<?php

namespace App\Views;

use App\Models\Prompt;
use Livewire\Component;

class RequestPanel extends Component
{

    public Prompt $prompt;
    public ?string $provider = null;
    public ?string $model = null;

    public function add(): void {
        $data = [
            'provider' => $this->provider,
            'model' => $this->model,
            'has_frontend' => true,
            'has_api' => true,
        ];

        $request = $this->prompt->requests()->create($data);

        $this->reset('model', 'provider');

    }

    public function render()
    {
        return view('components.request-panel');
    }
}
