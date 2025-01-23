<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('prompt_id')->constrained('prompts');
            $table->string('state');
            $table->string('provider');
            $table->string('model');
            $table->text('prompt_text');
            $table->string('response_type')->nullable()->default(null);
            $table->text('response_schema')->nullable()->default(null);
            $table->float('temperature');
            $table->dateTime('started_at')->nullable()->default(null);
            $table->dateTime('finished_at')->nullable()->default(null);
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
