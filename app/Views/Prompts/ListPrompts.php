<?php

namespace App\Views\Prompts;

use App\Models\Prompt;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListPrompts extends Component
{
    public Collection $prompts;

    public function mount(): void
    {
        $this->prompts = Prompt::all();
    }

    public function render()
    {
        return view('components.prompts.list-prompts')
            ->extends('components.layouts.app')
            ->title('Prompts');
    }
}
