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
        Schema::create('cabin_table', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cabin_details_id');
            $table->unsignedBigInteger('vessel_id');
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();

            $table->year('trip_year')->nullable();
            $table->decimal('cabin_price', 10, 2)->nullable();
            $table->decimal('surcharge_percentage', 5, 2)->nullable();

            $table->timestamps();

            $table->foreign('vessel_id')
                ->references('id')
                ->on('vessel_table')
                ->onDelete('cascade');

            $table->foreign('cabin_details_id')
                ->references('id')
                ->on('cabin_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_table');
    }
};
