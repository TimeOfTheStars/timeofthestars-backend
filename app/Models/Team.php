<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = ['name', 'city', 'players_count', 'wins', 'losses'];

    public function gamesAsTeamA(): HasMany
    {
        return $this->hasMany(Game::class, 'team_a_id');
    }

    public function gamesAsTeamB(): HasMany
    {
        return $this->hasMany(Game::class, 'team_b_id');
    }

    public function championships(): BelongsToMany
    {
        return $this->belongsToMany(Championship::class, 'championship_team', 'team_id', 'championship_id');
    }

    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(Tournament::class, 'tournament_team', 'team_id', 'tournament_id');
    }

    public function championshipPlayers(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'championship_players', 'team_id', 'player_id')
            ->withPivot('championship_id', 'matches', 'goals', 'assists', 'penalties', 'number');
    }

    public function tournamentPlayers(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'tournament_players', 'team_id', 'player_id')
            ->withPivot('tournament_id', 'matches', 'goals', 'assists', 'penalties', 'number');
    }
}

//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasMany;
//
//class Team extends Model
//{
//    protected $fillable = ['name', 'city', 'players_count', 'wins', 'losses'];
//
//    public function players(): HasMany
//    {
//        return $this->hasMany(Player::class);
//    }
//
//    public function gamesAsTeamA()
//    {
//        return $this->hasMany(Game::class, 'team_a_id');
//    }
//
//    public function gamesAsTeamB()
//    {
//        return $this->hasMany(Game::class, 'team_b_id');
//    }
//}
