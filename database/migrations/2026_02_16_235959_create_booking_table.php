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

            $table->string('ref_code', 100);

            $table->string('user_id', 100)->nullable();

            $table->integer('booking_details_id');

            $table->string('trip_year', 100);

            $table->string('status', 100)
                ->comment('0 - New, 1 - Confirmed, 3 - Payment Verification, 4 - Paid');

            $table->dateTime('booking_date');

            $table->integer('schedule_id');

            $table->integer('partner_id');
            $table->timestamps();
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
