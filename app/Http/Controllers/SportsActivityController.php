<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportsActivity;

class SportsActivityController extends Controller
{
    public function index()
    {
        return SportsActivity::all();
    }

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
