<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityRecord;
use Illuminate\Support\Facades\Log;
use App\Models\SportsMovement;

class ActivityRecordController extends Controller
{
    public function index()
    {
        return ActivityRecord::all();
    }

    // public function store(Request $request)
    // {
    //     $activityRecord = new ActivityRecord;
    //     $activityRecord->user_id = $request->user()->id;
    //     $activityRecord->sport_activity_id = $request->sport_activity_id;
    //     $activityRecord->duration = $request->duration;
    //     $activityRecord->sport_movement_ids = $request->sport_movement_ids ?? ''; // Provide a default value
    //     $activityRecord->save();

    //     if ($request->has('sport_movement_ids')) {
    //         $sportsMovements = SportsMovement::findMany($request->sport_movement_ids);
    //         $activityRecord->sportsMovements()->attach($sportsMovements);
    //     }

    //     return response()->json($activityRecord->load('sportsMovements'), 201);
    // }

    public function store(Request $request)
    {
        $activityRecord = new ActivityRecord;
        $activityRecord->user_id = $request->user()->id;
        $activityRecord->sport_activity_id = $request->sport_activity_id;
        $activityRecord->duration = $request->duration;
        $activityRecord->save();
    
        if ($request->has('sport_movement_ids')) {
            $sport_movement_ids = is_array($request->sport_movement_ids) ? $request->sport_movement_ids : explode(',', $request->sport_movement_ids);
            $activityRecord->sportsMovements()->attach($sport_movement_ids);
        }
    
        return response()->json($activityRecord->load('sportsMovements'), 201);
    }

    public function show($userId)
    {
        $activityRecords = ActivityRecord::where('user_id', $userId)
            ->with(['sportsActivity', 'sportsMovements'])
            ->get();

        // Debugging
        foreach ($activityRecords as $record) {
            Log::info('ActivityRecord ID: ' . $record->id);
            Log::info('SportsActivity: ' . optional($record->sportsActivity)->toJson());
            Log::info('SportsMovements: ' . $record->sportsMovements->toJson());
        }

        // Transform the data to include sport_name and sport_movement in the response
        // $transformedRecords = $activityRecords->map(function ($record) {
        //     Log::info('Record: ' . $record->toJson());
        //     $record->sport_name = $record->sportsActivity && $record->sportsActivity->name ? $record->sportsActivity->name : 'N/A';
        //     $record->sport_movement = $record->sportsMovements && $record->sportsMovements->pluck('name')->join(', ') ? $record->sportsMovements->pluck('name')->join(', ') : 'N/A';
        //     return $record;
        // });

        $transformedRecords = $activityRecords->map(function ($record) {
            Log::info('Record: ' . $record->toJson());
            $record->sport_name = optional($record->sportsActivity)->name ?? 'N/A';
            $record->sport_movement = $record->sportsMovements->pluck('name')->join(', ') ?: 'N/A';
            return $record;
        });

        Log::info('Transformed Records: ' . $transformedRecords->toJson());

        return $transformedRecords;
    }


    
    public function update(Request $request, ActivityRecord $activityRecord)
    {
        $activityRecord->update($request->all());
        return $activityRecord;
    }

    public function destroy(ActivityRecord $activityRecord)
    {
        $activityRecord->delete();
        return response()->json(null, 204);
    }
}