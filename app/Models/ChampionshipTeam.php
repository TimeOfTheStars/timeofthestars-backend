<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChampionshipTeam extends Model
{
    protected $fillable = ['championship_id', 'team_id','wins', 'losses', 'draws', 'goals_scored', 'goals_conceded', 'games_count', 'extra_points'];

    public function championship(): BelongsTo
    {
        return $this->belongsTo(Championship::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
