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
        Schema::create('activity_records', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('activity_id');
            $table->integer('duration');
            // jarak tempuh
            $table->integer('distance');
            // detak jantung
            $table->integer('heart_rate');
            // kelembaban
            $table->integer('humidity');
            // waktu rehidrasi
            $table->integer('rehydration_time');
            // hari pertama haid terakhir
            $table->date('last_menstrual_period');
            // keluhan
            $table->text('complaints');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_records');
    }
};
