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
        $jogging = SportsActivity::where('sport_type', 'Jogging')->first();
        $swimming = SportsActivity::where('sport_type', 'Swimming')->first();
        $cycling = SportsActivity::where('sport_type', 'Cycling')->first();
        
        if ($jogging) {
            SportsMovement::create([
                'sports_activity_id' => $jogging->id,
                'name' => 'Movement 1',
            ]);

            SportsMovement::create([
                'sports_activity_id' => $jogging->id,
                'name' => 'Movement 2',
            ]);

            SportsMovement::create([
                'sports_activity_id' => $jogging->id,
                'name' => 'Movement 3',
            ]);
            // Add more sports movements as needed
        }
        
        if ($swimming) {
            SportsMovement::create([
                'sports_activity_id' => $swimming->id,
                'name' => 'Movement 1',
            ]);

            SportsMovement::create([
                'sports_activity_id' => $swimming->id,
                'name' => 'Movement 2',
            ]);

            SportsMovement::create([
                'sports_activity_id' => $swimming->id,
                'name' => 'Movement 3',
            ]);

            if ($cycling) {
                SportsMovement::create([
                    'sports_activity_id' => $cycling->id,
                    'name' => 'Movement 1',
                ]);

                SportsMovement::create([
                    'sports_activity_id' => $cycling->id,
                    'name' => 'Movement 2',
                ]);

                SportsMovement::create([
                    'sports_activity_id' => $cycling->id,
                    'name' => 'Movement 3',
                ]);
            }
        }
    }
}