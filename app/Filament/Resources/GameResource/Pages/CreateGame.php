<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGame extends CreateRecord
{
    protected static string $resource = GameResource::class;

    /**
     * Called after the record is created.
     */
    protected function afterCreate(): void
    {
//        parent::afterCreate();

        $data = $this->data;

        // Синхронизируем связанные турниры/чемпионаты (pivot)
        if (isset($data['tournament_ids'])) {
            $this->record->tournaments()->sync($data['tournament_ids']);
        }

        if (isset($data['championship_ids'])) {
            $this->record->championships()->sync($data['championship_ids']);
        }
    }
}
