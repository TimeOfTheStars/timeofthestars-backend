<?php

namespace App\Http\Controllers\Api;

use App\Models\Championship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChampionshipController extends Controller
{
    public function index()
    {
        return Championship::with(['teams', 'games'])->get();
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

        $c = Championship::create($validated);

        if (!empty($validated['team_ids'])) {
            $c->teams()->sync($validated['team_ids']);
        }
        if (!empty($validated['game_ids'])) {
            $c->games()->sync($validated['game_ids']);
        }

        return $c->load(['teams', 'games']);
    }

    public function show(Championship $championship)
    {
        return $championship->load(['teams', 'games']);
    }

    public function update(Request $request, Championship $championship)
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

        $championship->update($validated);

        if (array_key_exists('team_ids', $validated)) {
            $championship->teams()->sync($validated['team_ids'] ?? []);
        }
        if (array_key_exists('game_ids', $validated)) {
            $championship->games()->sync($validated['game_ids'] ?? []);
        }

        return $championship->load(['teams', 'games']);
    }

    public function destroy(Championship $championship)
    {
        $championship->delete();
        return response()->noContent();
    }
}
