<?php

namespace App\Views\Prompts;

use App\Models\Prompt;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class CreatePrompt extends Component
{

    #[Required]
    public ?string $title = null;

    #[Required]
    public ?string $prompt = null;

    public ?string $description = null;

    public ?string $response_type = null;
    public ?string $response_schema = null;


    #[Computed]
    public function isValid(): bool {
        if (!empty($this->prompt) && !empty($this->title)) {
            return true;
        }

        return false;
    }

    public function add(): void
    {
        $data = [
            'title' => $this->title,
            'prompt' => $this->prompt,
            'description' => $this->description,
            'response_type' => $this->response_type,
            'response_schema' => $this->response_schema,
        ];

        $prompt = new Prompt($data);
        $prompt->save();

        $this->redirect(route('show-prompt', ['prompt' => $prompt]));

    }


    public function render()
    {
        return view('components.prompts.create-prompt')
            ->title('Add Prompt')
            ->extends('components.layouts.app');
    }
}
