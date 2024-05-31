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
            'calories_burned_prediction' => 100,
        ]);
        SportsActivity::create([
            'sport_type' => 'Swimming',
            'calories_burned_prediction' => 200,
        ]);
        SportsActivity::create([
            'sport_type' => 'Cycling',
            'calories_burned_prediction' => 150,
        ]);
        
    }
}