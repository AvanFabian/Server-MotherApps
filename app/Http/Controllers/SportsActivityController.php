<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportsActivity;
use App\Models\SportsMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SportsActivityController extends Controller
{

    // In SportsActivityController

    public function getAll()
    {
        $activities = SportsActivity::all();
        return response()->json($activities);
    }

    public function getMovementsByActivityName(Request $request)
    {
        $activity_name = $request->query('activity_name');
        $activity = SportsActivity::where('sport_type', $activity_name)->first();
        if ($activity === null) {
            // Return an error response if no matching activity was found
            return response()->json(['error' => 'No activity found with the given name'], 404);
        }
        $movements = $activity->sportsMovements;
        Log::info('Movements: ' . json_encode($movements));
        return response()->json($movements);
    }

    public function getSportActivityId(Request $request)
    {
        $activity_name = $request->query('activity_name');
        $activity = SportsActivity::where('sport_type', $activity_name)->first();
        if ($activity === null) {
            // Return an error response if no matching activity was found
            return response()->json(['error' => 'No activity found with the given name'], 404);
        }
        return response()->json($activity->id);
    }


    public function getSportMovementId(Request $request)
    {
        $movement_name = $request->query('activity_name');
        $movement = SportsMovement::where('name', $movement_name)->first();
        if ($movement === null) {
            // Return an error response if no matching movement was found
            return response()->json(['error' => 'No movement found with the given name'], 404);
        }
        return response()->json($movement->id);
    }

    public function getCaloriesBurnedPredictions(Request $request)
    {
        // Get the IDs of the selected sport movements from the request
        $ids = $request->get('ids');
        Log::info('IDs: ' . $ids);
        // Fetch the calories_burned_prediction for each selected sport movement
        $predictions = DB::table('sports_movements')
            ->whereIn('id', explode(',', $ids))
            ->pluck('calories_burned_prediction', 'id'); // Use 'id' as the key

        Log::info('Predictions: ' . json_encode($predictions));

        // Return the predictions as a JSON response
        return response()->json($predictions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sport_type' => 'required',
            'calories_burned_prediction' => 'required',
        ]);

        return SportsActivity::create($request->all());
    }

    public function show(SportsActivity $sportsActivity)
    {
        return $sportsActivity;
    }

    public function update(Request $request, SportsActivity $sportsActivity)
    {
        $sportsActivity->update($request->all());
        return $sportsActivity;
    }

    public function destroy(SportsActivity $sportsActivity)
    {
        $sportsActivity->delete();
        return response()->json(null, 204);
    }
}