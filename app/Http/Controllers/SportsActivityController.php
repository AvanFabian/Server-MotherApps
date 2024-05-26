<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportsActivity;

class SportsActivityController extends Controller
{

    // In SportsActivityController

    public function getByName(Request $request)
    {
        $name = $request->query('name');
        $activity = SportsActivity::where('name', $name)->first();
        return response()->json($activity);
    }

    public function getMovementsByActivityName(Request $request)
    {
        $activity_name = $request->query('activity_name');
        $activity = SportsActivity::where('name', $activity_name)->first();
        $movements = $activity->movements; // Assuming you have a relationship set up
        return response()->json($movements);
    }


    // public function index()
    // {
    //     return SportsActivity::all();
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
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