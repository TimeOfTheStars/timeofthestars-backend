<?php

namespace App\Filament\Resources;

use App\Models\Game;
use App\Filament\Resources\GameResource\Pages;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;
    protected static ?string $navigationLabel = 'Матчи';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('team_a_id')
                ->relationship('teamA', 'name')
                ->required()
                ->label('Команда A'),
            Forms\Components\Select::make('team_b_id')
                ->relationship('teamB', 'name')
                ->required()
                ->label('Команда B'),
            Forms\Components\DatePicker::make('date')->required()->label('Дата'),
            Forms\Components\TimePicker::make('time')->required()->label('Время'),
            Forms\Components\TextInput::make('location')->label('Место'),
            Forms\Components\TextInput::make('score')->label('Счёт (пример 2:1)'),
            // связывание с турнирами/чемпионатами: мультиселект
            Forms\Components\Select::make('tournament_ids')
                ->label('Турниры')
                ->multiple()
                ->options(\App\Models\Tournament::pluck('name','id')->toArray()),
            Forms\Components\Select::make('championship_ids')
                ->label('Чемпионаты')
                ->multiple()
                ->options(\App\Models\Championship::pluck('name','id')->toArray()),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('teamA.name')->label('Команда A'),
            Tables\Columns\TextColumn::make('teamB.name')->label('Команда B'),
            Tables\Columns\TextColumn::make('date')->date()->label('Дата'),
            Tables\Columns\TextColumn::make('time')->label('Время'),
            Tables\Columns\TextColumn::make('score')->label('Счёт'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        // синхронизируем pivot-таблицы после создания/обновления в соответствующих методах ресурса в Pages,
        // либо сделаем в Page->create/update обработку: ниже покажу пример в Custom Page если нужно.
        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
