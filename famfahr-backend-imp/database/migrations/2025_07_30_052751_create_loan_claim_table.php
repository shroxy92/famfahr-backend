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
        Schema::create('loan_claim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // Reference to users table
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['Bank Transfer', 'Cash', 'Cheque']);
            $table->unsignedInteger('duration_months');
            $table->string('start_month');
            $table->year('start_year');
            $table->text('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_claim');
    }

};
