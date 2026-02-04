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

        Schema::create('booking_table', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code', 50);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('booking_details_id')->nullable();
            $table->year('trip_year')->nullable();
            $table->string('status')->default('pending');
            $table->date('booking_date')->nullable();
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB'; // ensure InnoDB
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_table');
    }
};
