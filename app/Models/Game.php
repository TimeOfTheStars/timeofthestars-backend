<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    protected $fillable = ['team_a_id', 'team_b_id', 'date', 'time', 'location', 'score'];

    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(Tournament::class, 'tournament_games', 'game_id', 'tournament_id');
    }

    public function championships(): BelongsToMany
    {
        return $this->belongsToMany(Championship::class, 'championship_games', 'game_id', 'championship_id');
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }
}
