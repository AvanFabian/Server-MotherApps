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
                'calories_burned_prediction' => 250,
                'youtube_link' => 'https://www.youtube.com/watch?v=U8CCYGgPn60',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Sepeda Statis',
                'calories_burned_prediction' => 300,
                'youtube_link' => 'https://www.youtube.com/watch?v=TsyvlIsWnKw',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Running',
                'calories_burned_prediction' => 400,
                'youtube_link' => 'https://www.youtube.com/watch?v=s4_ZpnhBzYw',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $aerobic->id,
                'name' => 'Swimming',
                'calories_burned_prediction' => 400,
                'youtube_link' => 'https://www.youtube.com/watch?v=wIDjz9uqN4w',
            ]);
            // Resistence
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Weight Lifting',
                'calories_burned_prediction' => 300,
                'youtube_link' => 'https://www.youtube.com/watch?v=wIDjz9uqN4w',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (with TRX Straps)',
                'calories_burned_prediction' => 200,
                'youtube_link' => 'https://www.youtube.com/watch?v=iw45il0HwkA',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (Push Up, Pull Up, Squat, Plank)',
                'calories_burned_prediction' => 200,
                'youtube_link' => 'https://www.youtube.com/watch?v=iw45il0HwkA',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Load Machine',
                'calories_burned_prediction' => 200,
                'youtube_link' => 'https://www.youtube.com/watch?v=iw45il0HwkA',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $resistence->id,
                'name' => 'Strength (squats, lunges, burpees)',
                'calories_burned_prediction' => 300,
                'youtube_link' => 'https://www.youtube.com/watch?v=iw45il0HwkA',
            ]);
            // Flexibility
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Dynamic Stretching (harmstring, pinggul, bahu)',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=rPLw0kk9los',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Yoga Prenatal',
                'calories_burned_prediction' => 150,
                'youtube_link' => 'https://www.youtube.com/watch?v=rPLw0kk9los',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Pilates Prenatal',
                'calories_burned_prediction' => 150,
                'youtube_link' => 'https://www.youtube.com/watch?v=rPLw0kk9los',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $flexibility->id,
                'name' => 'Stretching with Gymball',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=rPLw0kk9los',
            ]);
            // Neuromotor
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Pilates',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=0ZgHkOWk-_8',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Yoga',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=0ZgHkOWk-_8',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $neuromotor->id,
                'name' => 'Tai Chi',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=0ZgHkOWk-_8',
            ]);
            // Pelvic Floor Training
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Kegel Exercise',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=_NuvqZG2bDI',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Bridge',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=_NuvqZG2bDI',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Squat',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=_NuvqZG2bDI',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Pelvic Tilt',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=_NuvqZG2bDI',
            ]);
            SportsMovement::create([
                'sports_activity_id' => $pelvic->id,
                'name' => 'Cat Cow Stretch',
                'calories_burned_prediction' => 75,
                'youtube_link' => 'https://www.youtube.com/watch?v=_NuvqZG2bDI',
            ]);
        }
    }
}