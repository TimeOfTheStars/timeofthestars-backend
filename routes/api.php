<?php

use App\Http\Controllers\Api\{
PlayerController, TeamController, GameController,
TournamentController, ChampionshipController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('players', PlayerController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('games', GameController::class);
Route::apiResource('tournaments', TournamentController::class);
Route::apiResource('championships', ChampionshipController::class);
