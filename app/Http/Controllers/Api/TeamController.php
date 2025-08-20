<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
//    public function index()
//    {
//        return Team::with('players')->get();
//    }

    public function index()
    {
        return Team::with(['championshipPlayers', 'tournamentPlayers'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:teams,name',
            'city' => 'nullable|string',
            'players_count' => 'nullable|integer|min:0',
            'wins' => 'nullable|integer|min:0',
            'losses' => 'nullable|integer|min:0',
        ]);

        return Team::create($validated);
    }

//    public function show(Team $team)
//    {
//        return $team->load('players');
//    }

    public function show(Team $team)
    {
        return $team->load(['championshipPlayers', 'tournamentPlayers']);
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|unique:teams,name,' . $team->id,
            'city' => 'nullable|string',
            'players_count' => 'nullable|integer|min:0',
            'wins' => 'nullable|integer|min:0',
            'losses' => 'nullable|integer|min:0',
        ]);

        $team->update($validated);
        return $team;
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->noContent();
    }
}
