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
        Schema::create('applicant_properties', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Applicant::class)->constrained()->cascadeOnDelete();
            $table->string('property_name')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_rt')->nullable();
            $table->string('address_rw')->nullable();
            $table->string('address_sub_district')->nullable(); // kelurahan
            $table->string('address_district')->nullable(); // kecamatan
            $table->string('address_city')->nullable();
            $table->string('address_postal_code', 10)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->enum('property_type', ['house', 'apartment', 'shophouse'])->nullable();
            $table->enum('ownership_status', ['freehold', 'leasehold', 'strata_title'])->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('owner_name')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('building_width')->nullable();
            $table->integer('land_width')->nullable();
            $table->integer('imb_number')->nullable();
            $table->string('pks_number')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_properties');
    }
};
