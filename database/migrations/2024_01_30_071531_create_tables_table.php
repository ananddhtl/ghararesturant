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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->enum('table_status',['ok','maintainance'])->default('ok');
            $table->foreignId('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->string('img');
            $table->longText('description');
            $table->string('table_no')->unique();
            $table->string('floor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
