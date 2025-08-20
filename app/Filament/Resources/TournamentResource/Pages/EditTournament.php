<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use App\Filament\Resources\TournamentResource;
use Filament\Resources\Pages\EditRecord;

class EditTournament extends EditRecord
{
    protected static string $resource = TournamentResource::class;

    protected function afterSave(): void
    {
//        parent::afterSave();

        $data = $this->data;

        if (isset($data['team_ids'])) {
            $this->record->teams()->sync($data['team_ids']);
        }

        if (isset($data['game_ids'])) {
            $this->record->games()->sync($data['game_ids']);
        }
    }
}
