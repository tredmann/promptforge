<?php

namespace App\Views\Prompts;

use App\Models\Prompt;
use App\Models\Request;
use Livewire\Component;

class ShowRequest extends Component
{
    public Prompt $prompt;

    public Request $request;

    public function mount(Prompt $prompt, Request $request)
    {
        $this->prompt = $prompt;
        $this->request = $request;
    }

    public function refreshResponse()
    {
        $this->request->refresh();
    }

    public function render()
    {
        return view('components.prompts.show-request')
            ->extends('components.layouts.app')
            ->title($this->prompt->title);
    }
}
