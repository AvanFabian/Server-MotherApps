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
        Schema::create('sports_activities', function (Blueprint $table) {
            $table->id();
            $table->string('sport_type');
            // $table->string('calories_burned_prediction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_records');
        Schema::dropIfExists('activity_routes');
        Schema::dropIfExists('activity_record_sports_movement');
        Schema::dropIfExists('sports_movements');
        Schema::dropIfExists('sports_activities');
        Schema::dropIfExists('users');
    }
};