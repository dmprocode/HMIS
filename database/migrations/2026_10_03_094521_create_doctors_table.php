<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('userImage', 255)->nullable();

            $table->foreignId('user_id')
                  ->unique()
                  ->constrained('admins')
                  ->cascadeOnDelete();
            $table->string('highest_education', 100);
            $table->string('medical_school', 150)->nullable();
            $table->string('specialization_training', 150)->nullable();
            $table->string('license_number', 50);
            $table->string('license_status');
            $table->string('department', 100)->nullable();
            $table->string('position', 100)->nullable();
            $table->string('primary_specialization', 100)->nullable();
            $table->string('specialist_field', 100)->nullable();
            $table->text('clinical_focus')->nullable();

            // Employment
            $table->string('employment_type')->default('full_time');
            $table->date('joined_date')->nullable();
            $table->decimal('consultation_fee', 10, 2)->default(0);
            $table->string('working_hours', 100)->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('department');
            $table->index('primary_specialization');
            $table->index('license_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};