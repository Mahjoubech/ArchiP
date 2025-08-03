<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('company_size')->nullable();
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('budget_range')->nullable();
            $table->json('project_preferences')->nullable();
            $table->json('communication_preferences')->nullable();
            $table->string('timezone')->nullable();
            $table->json('preferred_languages')->nullable();
            $table->json('verification_documents')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verification_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
}; 