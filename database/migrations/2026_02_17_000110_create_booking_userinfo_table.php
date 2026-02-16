<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_userinfo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('booking_id');

            $table->string('first_name', 100);
            $table->mediumText('last_name');

            $table->string('address_1', 100);
            $table->mediumText('address_2')->nullable();

            $table->string('country', 100);
            $table->string('city', 100);

            $table->string('mobile', 100);
            $table->string('email', 100);
            $table->string('phone', 100);

            $table->mediumText('guest_list');
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')
                ->on('booking_table')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_userinfo');
    }
};
