<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        return Game::with(['teamA', 'teamB', 'tournaments', 'championships'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_a_id' => 'required|exists:teams,id',
            'team_b_id' => 'required|exists:teams,id|different:team_a_id',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'nullable|string',
            'score' => 'nullable|string',
            'tournament_ids' => 'nullable|array',
            'tournament_ids.*' => 'exists:tournaments,id',
            'championship_ids' => 'nullable|array',
            'championship_ids.*' => 'exists:championships,id',
        ]);

        $game = Game::create($validated);
        if (!empty($validated['tournament_ids'])) {
            $game->tournaments()->sync($validated['tournament_ids']);
        }
        if (!empty($validated['championship_ids'])) {
            $game->championships()->sync($validated['championship_ids']);
        }

        return $game->load(['teamA', 'teamB', 'tournaments', 'championships']);
    }

    public function show(Game $game)
    {
        return $game->load(['teamA', 'teamB', 'tournaments', 'championships']);
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'team_a_id' => 'sometimes|required|exists:teams,id',
            'team_b_id' => 'sometimes|required|exists:teams,id|different:team_a_id',
            'date' => 'nullable|date',
            'time' => 'nullable',
            'location' => 'nullable|string',
            'score' => 'nullable|string',
            'tournament_ids' => 'nullable|array',
            'tournament_ids.*' => 'exists:tournaments,id',
            'championship_ids' => 'nullable|array',
            'championship_ids.*' => 'exists:championships,id',
        ]);

        $game->update($validated);

        if (array_key_exists('tournament_ids', $validated)) {
            $game->tournaments()->sync($validated['tournament_ids'] ?? []);
        }
        if (array_key_exists('championship_ids', $validated)) {
            $game->championships()->sync($validated['championship_ids'] ?? []);
        }

        return $game->load(['teamA', 'teamB', 'tournaments', 'championships']);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->noContent();
    }
}
