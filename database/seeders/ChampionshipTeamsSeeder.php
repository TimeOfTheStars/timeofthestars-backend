<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Championship;
use App\Models\ChampionshipTeam;
use Illuminate\Support\Facades\DB;

class ChampionshipTeamsSeeder extends Seeder
{
    public function run(): void
    {
        $championships = Championship::all();

        echo "=== ChampionshipTeamsSeeder started ===\n";
        echo "Found {$championships->count()} championships\n";

        foreach ($championships as $championship) {
        echo "Processing championship #" . $championship->id . " (" . (isset($championship->name) ? $championship->name : 'no name') . ")...\n";

            $games = DB::table('games')
                ->join('championship_games', 'games.id', '=', 'championship_games.game_id')
                ->where('championship_games.championship_id', $championship->id)
                ->get();

            echo "  Found {$games->count()} games\n";

            if ($games->isEmpty()) {
                echo "  ⚠️  No games for this championship, skipping.\n";
                continue;
            }

            $teams = [];
            foreach ($games as $g) {
                $teams[$g->team_a_id] = true;
                $teams[$g->team_b_id] = true;
            }

            echo "  Found " . count($teams) . " unique teams\n";

            foreach (array_keys($teams) as $teamId) {
                $wins = $losses = $draws = $goalsScored = $goalsConceded = $gamesCount = $extraPoints = 0;

                foreach ($games as $g) {
                    if ($g->score_team_a === null || $g->score_team_b === null) {
                        continue;
                    }

                    if ($g->bullet_win_team !== null && $g->bullet_win_team == $teamId) {
                        $extraPoints++;
                    }

                    if ($g->team_a_id == $teamId) {
                        $goalsScored += $g->score_team_a;
                        $goalsConceded += $g->score_team_b;
                        if ($g->score_team_a > $g->score_team_b) {
                            $wins++;
                        } elseif ($g->score_team_a < $g->score_team_b) {
                            $losses++;
                        } else {
                            $draws++;
                        }
                        $gamesCount++;
                    } elseif ($g->team_b_id == $teamId) {
                        $goalsScored += $g->score_team_b;
                        $goalsConceded += $g->score_team_a;
                        if ($g->score_team_b > $g->score_team_a) {
                            $wins++;
                        } elseif ($g->score_team_b < $g->score_team_a) {
                            $losses++;
                        } else {
                            $draws++;
                        }
                        $gamesCount++;
                    }
                }

                ChampionshipTeam::updateOrCreate(
                    [
                        'championship_id' => $championship->id,
                        'team_id' => $teamId,
                    ],
                    [
                        'wins' => $wins,
                        'losses' => $losses,
                        'draws' => $draws,
                        'goals_scored' => $goalsScored,
                        'goals_conceded' => $goalsConceded,
                        'games' => $gamesCount,
                        'extra_points' => $extraPoints,
                    ]
                );

                echo "    ✅ Team {$teamId}: {$wins}W / {$draws}D / {$losses}L | GS {$goalsScored} : {$goalsConceded} GC | {$gamesCount} games | +{$extraPoints} XP\n";
            }

            echo "✅ Finished championship #{$championship->id}\n\n";
        }

        echo "=== ChampionshipTeamsSeeder finished ===\n";
    }
}
