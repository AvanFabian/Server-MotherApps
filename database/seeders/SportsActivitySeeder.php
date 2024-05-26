<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SportsActivity;

class SportsActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportsActivity::create([
            'sport_type' => 'Jogging',
            'calories_burned_prediction' => 100, // Replace with your own value
        ]);

        // Add more sports activities as needed
    }
}