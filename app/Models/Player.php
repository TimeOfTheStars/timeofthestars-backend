<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    protected $fillable = ['full_name', 'birth_date', 'position', 'grip'];

    public function championships(): BelongsToMany
    {
        return $this->belongsToMany(Championship::class, 'championship_players', 'player_id', 'championship_id')
            ->withPivot('team_id', 'matches', 'goals', 'assists', 'penalties', 'number');
    }

    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(Tournament::class, 'tournament_players', 'player_id', 'tournament_id')
            ->withPivot('team_id', 'matches', 'goals', 'assists', 'penalties', 'number');
    }
}

//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//
//class Player extends Model
//{
//    protected $fillable = [
//        'full_name', 'birth_date', 'position', 'grip'];
//
//    public function team(): BelongsTo
//    {
//        return $this->belongsTo(Team::class);
//    }
//}
