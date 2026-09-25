<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('patient_number', 30)->unique();

            // Personal
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone', 20);
            $table->text('address')->nullable();

            // Medical
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])
                  ->nullable();
            $table->text('allergies')->nullable();

            // Emergency
            $table->string('next_of_kin_phone', 20)->nullable();

            // Admin
            $table->enum('status', ['active', 'inactive', 'deceased'])
                  ->default('active');
            $table->foreignId('registered_by')
                  ->nullable()
                  ->constrained('admins')
                  ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('phone');
            $table->index('patient_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};