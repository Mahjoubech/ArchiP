<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('architect_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('proposed_budget', 12, 2);
            $table->integer('estimated_duration')->comment('in days');
            $table->date('delivery_date');
            $table->json('attachments')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'withdrawn'])->default('pending');
            $table->boolean('is_accepted')->default(false);
            $table->timestamp('accepted_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('client_notes')->nullable();
            $table->text('architect_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
}; 