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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // Personal Info
            $table->string('employee_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('nationality');
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('rf_id')->nullable();

            // Family Info
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();

            // Contact Info
            $table->string('phone');
            $table->string('emergency_contact')->nullable();
            $table->string('email')->unique();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->text('mailing_address')->nullable();
            $table->string('postal_code')->nullable();

            // Job Info
            $table->string('nid_name')->nullable();
            $table->date('joining_date');
            $table->string('designation');
            $table->string('department');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
