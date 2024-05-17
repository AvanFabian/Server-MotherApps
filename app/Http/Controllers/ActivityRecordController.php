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
        $request->validate([
            'user_id' => 'required',
            'activity_id' => 'required',
            'duration' => 'required',
            'distance' => 'required',
            'heart_rate' => 'required',
        ]);

        return ActivityRecord::create($request->all());
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
