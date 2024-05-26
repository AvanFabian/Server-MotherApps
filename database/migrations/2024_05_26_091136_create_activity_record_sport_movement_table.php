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
        Schema::create('activity_record_sport_movement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_record_id')->constrained()->onDelete('cascade');
            $table->foreignId('sport_movement_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_record_sport_movement');
    }
};