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
        Schema::create('cabin_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vessel_id');
            $table->unsignedBigInteger('partner_id')->nullable();

            $table->string('cabin_name');
            $table->text('cabin_description')->nullable();
            $table->string('cabin_thumbnail')->nullable();
            $table->json('cabin_photos')->nullable();
            $table->unsignedInteger('guest_capacity')->nullable();
            $table->unsignedInteger('bed_number')->nullable();
            $table->unsignedInteger('cabin_number')->nullable();

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
        Schema::dropIfExists('cabin_details');
    }
};
