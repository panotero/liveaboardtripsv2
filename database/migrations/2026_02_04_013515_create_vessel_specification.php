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
        Schema::create('vessel_specification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vessel_id');

            $table->year('vessel_year_model')->nullable();
            $table->year('vessel_year_renovation')->nullable();
            $table->string('vessel_beam')->nullable();
            $table->string('vessel_fuel_capacity')->nullable();
            $table->unsignedInteger('vessel_cabin_capacity')->nullable();
            $table->unsignedInteger('vessel_bathroom_number')->nullable();
            $table->string('vessel_topspeed')->nullable();
            $table->string('vessel_cruisingspeed')->nullable();
            $table->string('vessel_engines')->nullable();
            $table->unsignedInteger('vessel_max_guest_capacity')->nullable();
            $table->string('vessel_freshwater_maker')->nullable();
            $table->string('vessel_tenders')->nullable();
            $table->string('vessel_water_capacity')->nullable();

            $table->timestamps();

            $table->foreign('vessel_id')
                ->references('id')
                ->on('vessel_table')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_specification');
    }
};
