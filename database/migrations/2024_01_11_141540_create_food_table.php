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
        Schema::create('food', function (Blueprint $table) {
          $table->id();
            $table->string('img');
            $table->foreignId('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->string('name');
            $table->string('price');
            $table->string('type');
            $table->longText('description');
            $table->longText('sub_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
