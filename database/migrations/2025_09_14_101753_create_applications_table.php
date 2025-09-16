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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('developer')->nullable();
            $table->string('location')->nullable();
            $table->decimal('price_range_start')->nullable();
            $table->decimal('price_range_end')->nullable();
            $table->string('status');
            $table->text('notes')->nullable();

            $table->decimal('price')->nullable();
            $table->string('address')->nullable();
            $table->integer('land_area')->nullable();
            $table->integer('building_area')->nullable();
            $table->string('id_card')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_proof')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
