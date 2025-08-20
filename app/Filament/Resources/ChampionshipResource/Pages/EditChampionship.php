<?php

namespace App\Filament\Resources\ChampionshipResource\Pages;

use App\Filament\Resources\ChampionshipResource;
use Filament\Resources\Pages\EditRecord;

class EditChampionship extends EditRecord
{
    protected static string $resource = ChampionshipResource::class;

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
