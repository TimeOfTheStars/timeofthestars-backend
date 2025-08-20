<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tournament extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'location'];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'tournament_teams', 'tournament_id', 'team_id');
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'tournament_games', 'tournament_id', 'game_id');
    }
}
