<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tournament;
use App\Models\TournamentTeam;
use Illuminate\Support\Facades\DB;

class TournamentTeamsSeeder extends Seeder
{
    public function run(): void
    {
        $tournaments = Tournament::all();

        foreach ($tournaments as $tournament) {
            $games = DB::table('games')
                ->join('tournament_games', 'games.id', '=', 'tournament_games.game_id')
                ->where('tournament_games.tournament_id', $tournament->id)
                ->get();

            $teams = [];
            foreach ($games as $g) {
                $teams[$g->team_a_id] = true;
                $teams[$g->team_b_id] = true;
            }

            foreach (array_keys($teams) as $teamId) {
                $wins = $losses = $draws = $goalsScored = $goalsConceded = $gamesCount = $extraPoints = 0;

                foreach ($games as $g) {
                    // матч сыгран только если есть оба счёта
                    if ($g->score_team_a === null || $g->score_team_b === null) {
                        continue;
                    }

                    // если эта команда указана как bullet_win_team → добавляем extra point
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

                TournamentTeam::updateOrCreate(
                    ['tournament_id' => $tournament->id, 'team_id' => $teamId],
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
            }
        }
    }
}
