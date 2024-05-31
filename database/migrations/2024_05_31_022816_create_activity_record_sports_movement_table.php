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
        Schema::create('activity_record_sports_movement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_record_id');
            $table->unsignedBigInteger('sports_movement_id');
            $table->timestamps();
        
            $table->foreign('activity_record_id')->references('id')->on('activity_records')->onDelete('cascade');
            $table->foreign('sports_movement_id')->references('id')->on('sports_movements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_record_sports_movement');
    }
};