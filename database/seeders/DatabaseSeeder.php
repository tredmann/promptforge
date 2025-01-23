<?php

namespace Database\Seeders;

use App\Models\Prompt;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Prompt::factory()->create([
            'title' => 'Valentines day',
            'description' => 'Ask the LLM whats is Valentines day',
            'prompt' => 'What happens normally at the 14th of February?',
        ]);
    }
}
