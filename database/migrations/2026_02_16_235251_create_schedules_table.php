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
        Schema::create('schedule_table', function (Blueprint $table) {
            $table->id(); // int(10), primary, auto increment

            $table->string('schedule_title', 100);

            $table->date('schedule_from');
            $table->date('schedule_to');

            $table->integer('vessel_id');

            $table->string('itinerary', 100)->nullable();

            $table->integer('destination_id');

            $table->integer('partner_id');

            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_table');
    }
};
