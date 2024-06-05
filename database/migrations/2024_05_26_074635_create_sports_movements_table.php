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
        Schema::create('sports_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_activity_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('calories_burned_prediction');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports_movements');
    }
};