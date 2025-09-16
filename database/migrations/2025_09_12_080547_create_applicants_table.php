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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('national_id')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_rt')->nullable();
            $table->string('address_rw')->nullable();
            $table->string('address_sub_district')->nullable(); // kelurahan
            $table->string('address_district')->nullable(); // kecamatan
            $table->string('address_city')->nullable();
            $table->string('address_postal_code', 10)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number_1')->nullable();
            $table->string('mobile_number_2')->nullable();
            $table->string('contact_time_start')->nullable(); // e.g. 09:00
            $table->string('contact_time_end')->nullable(); // e.g. 09:00
            $table->string('email')->nullable();

            $table->enum('house_ownership_status', ['self_owned', 'family_owned', 'official_residence', 'rented', 'mortgaged', 'not_mortgaged'])->nullable();
            $table->integer('length_of_residence')->nullable(); // years

            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('religion', ['islam', 'protestant', 'catholic', 'hindu', 'buddhist', 'confucianism'])->nullable();
            $table->enum('marital_status', ['single', 'married', 'widowed'])->nullable();
            $table->unsignedTinyInteger('number_of_dependents')->nullable();
            $table->enum('last_education', ['elementary', 'junior_high', 'senior_high', 'bachelor', 'master', 'doctorate'])->nullable();

            $table->enum('job_type', ['state_owned', 'civil_servant', 'military_police', 'domestic_investment', 'entrepreneur', 'foreign_private', 'professional'])->nullable();
            $table->string('company_name')->nullable();
            $table->enum('business_entity_type', ['government', 'limited_liability', 'sole_proprietorship', 'cooperative', 'foundation', 'cv', 'others'])->nullable();
            $table->string('business_entity_type_other')->nullable();
            $table->string('business_field')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_rt')->nullable();
            $table->string('company_rw')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_postal_code', 10)->nullable();
            $table->string('company_phone_number')->nullable();
            $table->string('company_ext')->nullable();
            $table->string('company_fax_number')->nullable();
            $table->string('company_contact_time_start')->nullable();
            $table->string('company_contact_time_end')->nullable();
            $table->integer('total_employees')->nullable();
            $table->string('group_affiliation')->nullable();
            $table->string('position_or_nip')->nullable();
            $table->date('employment_start_date')->nullable();
            $table->string('length_of_employment_months')->nullable();
            $table->string('length_of_employment_years')->nullable();
            $table->enum('employment_status', ['permanent', 'contract', 'outsourced', 'honorary'])->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_position')->nullable();
            $table->string('supervisor_phone_number')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
