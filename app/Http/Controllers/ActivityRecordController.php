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
      $activityRecord->user_id = $request->user_id;
      $activityRecord->activity_name = $request->activity_name;
      $activityRecord->sub_movement = $request->sub_movement;
      $activityRecord->duration = $request->duration;
      $activityRecord->calories_prediction = $request->calories_prediction; // Handle the calories_prediction
      $activityRecord->save();
    
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