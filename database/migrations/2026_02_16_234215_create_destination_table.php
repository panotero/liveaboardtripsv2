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
        Schema::create('destination_table', function (Blueprint $table) {
            $table->id();

            $table->string('destination_name');
            $table->string('destination_country');

            $table->integer('destination_popularity_points')->default(0);

            $table->json('vessel_id_list')->nullable();

            $table->unsignedBigInteger('partner_id')->nullable();

            $table->json('destination_photos')->nullable();

            $table->string('destination_thumbnail')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_table');
    }
};
