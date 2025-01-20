<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prompts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->comment('A short title to easy find your saved prompt');
            $table->string('description')->nullable();
            $table->text('prompt');
            $table->string('response_type')->nullable()->comment('Most likely json');
            $table->string('response_schema')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prompts');
    }
};
