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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('table_id')->nullable();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('noofpeople');
            $table->dateTime('dateandtime');
            $table->enum('reservation_status', ['available','pending', 'booked', 'canceled'])->nullable();
            $table->longText('specialrequest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
