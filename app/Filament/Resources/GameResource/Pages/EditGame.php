<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use Filament\Resources\Pages\EditRecord;

class EditGame extends EditRecord
{
    protected static string $resource = GameResource::class;

    /**
     * Called after the record is saved (create or update flow uses this in edit).
     */
    protected function afterSave(): void
    {
//        parent::afterSave();

        $data = $this->data;

        if (isset($data['tournament_ids'])) {
            $this->record->tournaments()->sync($data['tournament_ids']);
        } else {
            // если поле отсутствует — отвяжем все (или оставим как есть). Тут решаем оставить без изменений.
            // $this->record->tournaments()->sync([]);
        }

        if (isset($data['championship_ids'])) {
            $this->record->championships()->sync($data['championship_ids']);
        }
    }
}
