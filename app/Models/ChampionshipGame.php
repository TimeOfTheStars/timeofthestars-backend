<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChampionshipGame extends Model
{
    protected $fillable = ['championship_id', 'game_id'];

    public function championship(): BelongsTo
    {
        return $this->belongsTo(Championship::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
