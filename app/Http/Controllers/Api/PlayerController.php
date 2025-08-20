<?php
//
//namespace App\Http\Controllers\Api;
//
//use App\Models\Player;
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//
//class PlayerController extends Controller
//{
//    public function index()
//    {
//        return Player::with('team')->get();
//    }
//
//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'full_name' => 'required|string',
//            'birth_date' => 'nullable|date',
//            'position' => 'nullable|string',
//            'grip' => 'nullable|string',
//            'team_id' => 'nullable|exists:teams,id',
//            'matches' => 'nullable|integer|min:0',
//            'goals' => 'nullable|integer|min:0',
//            'assists' => 'nullable|integer|min:0',
//            'penalties' => 'nullable|integer|min:0',
//            'number' => 'nullable|integer|min:0',
//        ]);
//
//        return Player::create($validated);
//    }
//
//    public function show(Player $player)
//    {
//        return $player->load('team');
//    }
//
//    public function update(Request $request, Player $player)
//    {
//        $validated = $request->validate([
//            'full_name' => 'sometimes|required|string',
//            'birth_date' => 'nullable|date',
//            'position' => 'nullable|string',
//            'grip' => 'nullable|string',
//            'team_id' => 'nullable|exists:teams,id',
//            'matches' => 'nullable|integer|min:0',
//            'goals' => 'nullable|integer|min:0',
//            'assists' => 'nullable|integer|min:0',
//            'penalties' => 'nullable|integer|min:0',
//            'number' => 'nullable|integer|min:0',
//        ]);
//
//        $player->update($validated);
//        return $player;
//    }
//
//    public function destroy(Player $player)
//    {
//        $player->delete();
//        return response()->noContent();
//    }
//}


namespace App\Http\Controllers\Api;

use App\Models\Player;
use App\Models\ChampionshipPlayer;
use App\Models\TournamentPlayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function index()
    {
        return Player::with(['championships', 'tournaments'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'birth_date' => 'nullable|date',
            'position' => 'nullable|string',
            'grip' => 'nullable|string',
        ]);

        $player = Player::create($validated);

        if ($request->has('championships')) {
            foreach ($request->input('championships', []) as $championship) {
                ChampionshipPlayer::create([
                    'championship_id' => $championship['championship_id'],
                    'team_id' => $championship['team_id'],
                    'player_id' => $player->id,
                    'matches' => $championship['matches'] ?? 0,
                    'goals' => $championship['goals'] ?? 0,
                    'assists' => $championship['assists'] ?? 0,
                    'penalties' => $championship['penalties'] ?? 0,
                    'number' => $championship['number'] ?? null,
                ]);
            }
        }

        if ($request->has('tournaments')) {
            foreach ($request->input('tournaments', []) as $tournament) {
                TournamentPlayer::create([
                    'tournament_id' => $tournament['tournament_id'],
                    'team_id' => $tournament['team_id'],
                    'player_id' => $player->id,
                    'matches' => $tournament['matches'] ?? 0,
                    'goals' => $tournament['goals'] ?? 0,
                    'assists' => $tournament['assists'] ?? 0,
                    'penalties' => $tournament['penalties'] ?? 0,
                    'number' => $tournament['number'] ?? null,
                ]);
            }
        }

        return $player->load(['championships', 'tournaments']);
    }

    public function show(Player $player)
    {
        return $player->load(['championships', 'tournaments']);
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'full_name' => 'sometimes|required|string',
            'birth_date' => 'nullable|date',
            'position' => 'nullable|string',
            'grip' => 'nullable|string',
        ]);

        $player->update($validated);

        if ($request->has('championships')) {
            ChampionshipPlayer::where('player_id', $player->id)->delete();
            foreach ($request->input('championships', []) as $championship) {
                ChampionshipPlayer::create([
                    'championship_id' => $championship['championship_id'],
                    'team_id' => $championship['team_id'],
                    'player_id' => $player->id,
                    'matches' => $championship['matches'] ?? 0,
                    'goals' => $championship['goals'] ?? 0,
                    'assists' => $championship['assists'] ?? 0,
                    'penalties' => $championship['penalties'] ?? 0,
                    'number' => $championship['number'] ?? null,
                ]);
            }
        }

        if ($request->has('tournaments')) {
            TournamentPlayer::where('player_id', $player->id)->delete();
            foreach ($request->input('tournaments', []) as $tournament) {
                TournamentPlayer::create([
                    'tournament_id' => $tournament['tournament_id'],
                    'team_id' => $tournament['team_id'],
                    'player_id' => $player->id,
                    'matches' => $tournament['matches'] ?? 0,
                    'goals' => $tournament['goals'] ?? 0,
                    'assists' => $tournament['assists'] ?? 0,
                    'penalties' => $tournament['penalties'] ?? 0,
                    'number' => $tournament['number'] ?? null,
                ]);
            }
        }

        return $player->load(['championships', 'tournaments']);
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return response()->noContent();
    }
}
