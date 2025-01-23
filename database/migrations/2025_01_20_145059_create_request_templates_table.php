<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Schema::create('request_templates', function (Blueprint $table) {
        //    $table->ulid('id')->primary();
        //    $table->foreignId('prompt_id')->constrained('prompts');
        //    $table->string('provider');
        //    $table->string('model');
        //    $table->boolean('has_api')->default(false);
        //    $table->boolean('has_frontend')->default(false);
        //    $table->timestamps();
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_templates');
    }
};
