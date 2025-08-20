<?php

namespace App\Http\Controllers\Api;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentController extends Controller
{
    public function index()
    {
        return Tournament::with(['teams', 'games'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string',
            'team_ids' => 'nullable|array',
            'team_ids.*' => 'exists:teams,id',
            'game_ids' => 'nullable|array',
            'game_ids.*' => 'exists:games,id',
        ]);

        $t = Tournament::create($validated);

        if (!empty($validated['team_ids'])) {
            $t->teams()->sync($validated['team_ids']);
        }
        if (!empty($validated['game_ids'])) {
            $t->games()->sync($validated['game_ids']);
        }

        return $t->load(['teams', 'games']);
    }

    public function show(Tournament $tournament)
    {
        return $tournament->load(['teams', 'games']);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string',
            'team_ids' => 'nullable|array',
            'team_ids.*' => 'exists:teams,id',
            'game_ids' => 'nullable|array',
            'game_ids.*' => 'exists:games,id',
        ]);

        $tournament->update($validated);

        if (array_key_exists('team_ids', $validated)) {
            $tournament->teams()->sync($validated['team_ids'] ?? []);
        }
        if (array_key_exists('game_ids', $validated)) {
            $tournament->games()->sync($validated['game_ids'] ?? []);
        }

        return $tournament->load(['teams', 'games']);
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return response()->noContent();
    }
}
