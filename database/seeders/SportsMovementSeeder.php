<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\SportsMovement;
use App\Models\SportsActivity;

class SportsMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aerobic = SportsActivity::where('sport_type', 'Aerobic/Cardio')->first();
        $resistence = SportsActivity::where('sport_type', 'Resistence')->first();
        $flexibility = SportsActivity::where('sport_type', 'Flexibility')->first();
        $neuromotor = SportsActivity::where('sport_type', 'Neuromotor')->first();
        $pelvic = SportsActivity::where('sport_type', 'Pelvic Floor Training')->first();
        
        if ($aerobic && $resistence && $flexibility && $neuromotor && $pelvic) {
            // Aerobic/Cardio
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Walking',
                'calories_burned_estimation' => 'Around 200-300 calories',
                'calories_burned_prediction' => 250,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Sepeda Statis',
                'calories_burned_estimation' => 'Around 300-400 calories',
                'calories_burned_prediction' => 300,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Running',
                'calories_burned_estimation' => 'Around 300-500 calories',
                'calories_burned_prediction' => 400,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Swimming',
                'calories_burned_estimation' => 'Around 300-500 calories',
                'calories_burned_prediction' => 400,
            ]);
            // Resistence
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Weight Lifting',
                'calories_burned_estimation' => 'Around 200-400 calories',
                'calories_burned_prediction' => 300,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (with TRX Straps)',
                'calories_burned_estimation' => 'Around 150-300 calories',
                'calories_burned_prediction' => 200,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (Push Up, Pull Up, Squat, Plank)',
                'calories_burned_estimation' => 'Around 100-300 calories',
                'calories_burned_prediction' => 200,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Load Machine',
                'calories_burned_estimation' => 'Around 150-250 calories',
                'calories_burned_prediction' => 200,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (squats, lunges, burpees)',
                'calories_burned_estimation' => 'Around 200-400 calories',
                'calories_burned_prediction' => 300,
            ]);
            // Flexibility
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Dynamic Stretching (harmstring, pinggul, bahu)',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Yoga Prenatal',
                'calories_burned_estimation' => 'Around 100-200 calories',
                'calories_burned_prediction' => 150,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Pilates Prenatal',
                'calories_burned_estimation' => 'Around 100-200 calories',
                'calories_burned_prediction' => 150,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Stretching with Gymball',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            // Neuromotor
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Pilates',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Yoga',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Tai Chi',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            // Pelvic Floor Training
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Kegel Exercise',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Bridge',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Squat',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Pelvic Tilt',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Cat Cow Stretch',
                'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
            ]);
        }
    }
}