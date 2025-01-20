<?php

namespace Database\Seeders;

use App\Models\Prompt;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Prompt::factory(10)->create();
    }
}
