<?php

namespace App\Filament\Resources\ChampionshipResource\Pages;

use App\Filament\Resources\ChampionshipResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChampionship extends CreateRecord
{
    protected static string $resource = ChampionshipResource::class;

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
