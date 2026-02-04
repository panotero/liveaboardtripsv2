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
        Schema::create('vessel_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id')->nullable();

            $table->string('vessel_name');
            $table->string('vessel_thumbnail')->nullable();
            $table->json('vessel_photos')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_table');
    }
};
