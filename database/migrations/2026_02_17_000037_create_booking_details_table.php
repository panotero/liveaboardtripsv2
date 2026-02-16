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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('booking_id');

            $table->integer('cabin_id');

            $table->integer('guest_number');

            $table->integer('schedule_id');
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')
                ->on('booking_table')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
