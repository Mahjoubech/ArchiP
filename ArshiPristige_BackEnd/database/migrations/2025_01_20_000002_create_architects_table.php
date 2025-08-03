<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('architects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('license_number')->nullable();
            $table->integer('years_of_experience')->default(0);
            $table->json('specializations')->nullable();
            $table->json('education')->nullable();
            $table->json('certifications')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->enum('availability_status', ['available', 'busy', 'unavailable'])->default('available');
            $table->json('languages_spoken')->nullable();
            $table->json('service_areas')->nullable();
            $table->json('verification_documents')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verification_date')->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_projects')->default(0);
            $table->integer('completed_projects')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('architects');
    }
}; 