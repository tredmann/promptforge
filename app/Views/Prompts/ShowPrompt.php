<?php

namespace App\Views\Prompts;

use App\Models\Prompt;
use Livewire\Component;

class ShowPrompt extends Component
{
    public Prompt $prompt;

    public function mount(Prompt $prompt): void
    {
        $this->prompt = $prompt;
    }

    public function render()
    {
        return view('components.prompts.show-prompt')
            ->extends('components.layouts.app')
            ->title($this->prompt->title);
    }
}
