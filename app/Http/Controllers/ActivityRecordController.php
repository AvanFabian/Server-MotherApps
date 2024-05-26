<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityRecord;

class ActivityRecordController extends Controller
{
    public function index()
    {
        return ActivityRecord::all();
    }

    public function store(Request $request)
    {
        $activityRecord = new ActivityRecord;
        $activityRecord->user_id = $request->user()->id;
        $activityRecord->sport_activity_id = $request->sport_activity_id;
        $activityRecord->duration = $request->duration;
        $activityRecord->save();

        $activityRecord->sportsMovements()->sync($request->sport_movement_ids);

        return response()->json($activityRecord, 201);
    }

    public function show(ActivityRecord $activityRecord)
    {
        return $activityRecord;
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
