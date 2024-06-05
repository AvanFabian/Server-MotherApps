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
                // 'calories_burned_estimation' => 'Around 200-300 calories',z
                'calories_burned_prediction' => 250,
                'image' => 'images/walking.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Sepeda Statis',
                // 'calories_burned_estimation' => 'Around 300-400 calories',
                'calories_burned_prediction' => 300,
                'image' => 'images/sepeda-statis.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Running',
                // 'calories_burned_estimation' => 'Around 300-500 calories',
                'calories_burned_prediction' => 400,
                'image' => 'images/running.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Swimming',
                // 'calories_burned_estimation' => 'Around 300-500 calories',
                'calories_burned_prediction' => 400,
                'image' => 'images/swimming.jpg',
            ]);
            // Resistence
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Weight Lifting',
                // 'calories_burned_estimation' => 'Around 200-400 calories',
                'calories_burned_prediction' => 300,
                'image' => 'images/weight-lifting.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (with TRX Straps)',
                // 'calories_burned_estimation' => 'Around 150-300 calories',
                'calories_burned_prediction' => 200,
                'image' => 'images/strength.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (Push Up, Pull Up, Squat, Plank)',
                // 'calories_burned_estimation' => 'Around 100-300 calories',
                'calories_burned_prediction' => 200,
                'image' => 'images/strength-2.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Load Machine',
                // 'calories_burned_estimation' => 'Around 150-250 calories',
                'calories_burned_prediction' => 200,
                'image' => 'images/load-machine.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (squats, lunges, burpees)',
                // 'calories_burned_estimation' => 'Around 200-400 calories',
                'calories_burned_prediction' => 300,
                'image' => 'images/strength-3.jpg',
            ]);
            // Flexibility
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Dynamic Stretching (harmstring, pinggul, bahu)',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/dynamic-stretching.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Yoga Prenatal',
                // 'calories_burned_estimation' => 'Around 100-200 calories',
                'calories_burned_prediction' => 150,
                'image' => 'images/yoga-prenatal.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Pilates Prenatal',
                // 'calories_burned_estimation' => 'Around 100-200 calories',
                'calories_burned_prediction' => 150,
                'image' => 'images/pilates-prenatal.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Stretching with Gymball',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/stretching-gymball.jpg',
            ]);
            // Neuromotor
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Pilates',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/pilates.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Yoga',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/yoga.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Tai Chi',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/tai-chi.jpg',
            ]);
            // Pelvic Floor Training
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Kegel Exercise',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/kegel-exercise.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Bridge',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/bridge.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Squat',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/squat.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Pelvic Tilt',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/pelvic-tilt.jpg',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Cat Cow Stretch',
                // 'calories_burned_estimation' => 'Around 50-100 calories',
                'calories_burned_prediction' => 75,
                'image' => 'images/cat-cow-stretch.jpg',
            ]);
        }
    }
}
