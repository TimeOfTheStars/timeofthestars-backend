<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use App\Filament\Resources\TournamentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTournament extends CreateRecord
{
    protected static string $resource = TournamentResource::class;

    protected function afterCreate(): void
    {
//        parent::afterCreate();

        $data = $this->data;

        if (isset($data['team_ids'])) {
            $this->record->teams()->sync($data['team_ids']);
        }

        if (isset($data['game_ids'])) {
            $this->record->games()->sync($data['game_ids']);
        }
    }
}
