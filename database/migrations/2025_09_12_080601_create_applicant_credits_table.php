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
        Schema::create('applicant_credits', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Applicant::class)->constrained()->cascadeOnDelete();
            $table->enum('facility_type', ['kpr_non_subsidized', 'kpr_subsidized', 'kpr_second_hand', 'kpr_take_over', 'kpr_micro', 'kar_compensation', 'kar_take_over', 'kbr'])->nullable();
            $table->bigInteger('sale_price')->nullable();
            $table->bigInteger('down_payment')->nullable();
            $table->bigInteger('requested_credit')->nullable();
            $table->enum('payment_system', ['agf', 'collective', 'payroll'])->nullable();
            $table->enum('installment_source', ['single_income', 'join_income'])->nullable();
            $table->integer('loan_term')->nullable(); // in months
            $table->bigInteger('installment_estimate')->nullable();

            $table->enum('main_income_source', ['salary', 'business', 'others'])->nullable();
            $table->string('main_income_source_other')->nullable();
            $table->bigInteger('main_income')->nullable();
            $table->enum('additional_income_source', ['salary', 'business', 'investment', 'others'])->nullable();
            $table->string('additional_income_source_other')->nullable();
            $table->bigInteger('additional_income')->nullable();
            $table->bigInteger('estimated_annual_transaction')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_credits');
    }
};
