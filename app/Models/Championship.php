<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Championship extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'location'];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class);
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}
