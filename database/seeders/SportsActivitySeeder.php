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
            'sport_type' => 'Aerobic/Cardio',
            'usual_duration' => '30 minutes',
        ]);
        SportsActivity::create([
            'sport_type' => 'Resistence',
            'usual_duration' => '30 minutes',
        ]);
        SportsActivity::create([
            'sport_type' => 'Flexibility',
            'usual_duration' => '30 minutes',
        ]);
        SportsActivity::create([
            'sport_type' => 'Neuromotor',
            'usual_duration' => '30 minutes',

        ]);
        SportsActivity::create([
            'sport_type' => 'Pelvic Floor Training', 
            'usual_duration' => '30 minutes',
        ]);
    }
}