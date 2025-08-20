<?php

namespace App\Filament\Resources;

use App\Models\Championship;
use App\Filament\Resources\ChampionshipResource\Pages;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class ChampionshipResource extends Resource
{
    protected static ?string $model = Championship::class;
    protected static ?string $navigationLabel = 'Чемпионаты';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->label('Название'),
            Forms\Components\DatePicker::make('start_date')->label('Дата начала'),
            Forms\Components\DatePicker::make('end_date')->label('Дата окончания'),
            Forms\Components\TextInput::make('location')->label('Место'),
            Forms\Components\Select::make('team_ids')
                ->label('Участники')
                ->multiple()
                ->options(\App\Models\Team::pluck('name','id')->toArray()),
            Forms\Components\Select::make('game_ids')
                ->label('Матчи')
                ->multiple()
                ->options(\App\Models\Game::pluck('id','id')->toArray()),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('Название')->searchable(),
            Tables\Columns\TextColumn::make('start_date')->date()->label('Начало'),
            Tables\Columns\TextColumn::make('end_date')->date()->label('Конец'),
        ])->actions([Tables\Actions\EditAction::make()])->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChampionships::route('/'),
            'create' => Pages\CreateChampionship::route('/create'),
            'edit' => Pages\EditChampionship::route('/{record}/edit'),
        ];
    }
}
