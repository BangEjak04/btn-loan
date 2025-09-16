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
        Schema::create('applicant_emergency_contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Applicant::class)->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->enum('relationship', ['parents', 'siblings', 'children', 'aunts_uncles', 'others'])->nullable();
            $table->string('relationship_other')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_rt')->nullable();
            $table->string('address_rw')->nullable();
            $table->string('address_sub_district')->nullable(); // kelurahan
            $table->string('address_district')->nullable(); // kecamatan
            $table->string('address_city')->nullable();
            $table->string('address_postal_code', 10)->nullable();
            $table->enum('living_together_status', ['same_house', 'different_house'])->nullable();
            $table->string('contact_time_start')->nullable(); // e.g. 09:00
            $table->string('contact_time_end')->nullable(); // e.g. 09:00
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_emergency_contacts');
    }
};
