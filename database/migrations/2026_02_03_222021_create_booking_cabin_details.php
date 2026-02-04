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
        Schema::create('booking_cabin_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->string('ref_code', 50); // FK to booking
            $table->unsignedBigInteger('cabin_id');
            $table->unsignedInteger('guest_number');
            $table->unsignedBigInteger('schedule_id');
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')
                ->on('booking_table')
                ->onDelete('cascade');

            $table->index('cabin_id');
            $table->index('schedule_id');
            $table->index('ref_code');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_cabin_details');
    }
};
