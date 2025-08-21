<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChampionshipResource\Pages;
use App\Models\Championship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ChampionshipResource extends Resource
{
    protected static ?string $model = Championship::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Чемпионаты';
    protected static ?string $pluralLabel = 'Чемпионаты';
    protected static ?string $modelLabel = 'Чемпионат';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Название')
                ->required()
                ->maxLength(255),

            DatePicker::make('start_date')
                ->label('Дата начала'),

            DatePicker::make('end_date')
                ->label('Дата окончания'),

            TextInput::make('location')
                ->label('Локация')
                ->maxLength(255),

            Select::make('teams')
                ->label('Команды')
                ->multiple()
                ->relationship('teams', 'name')
                ->preload()
                ->searchable(),

//            Select::make('games')
//                ->label('Игры')
//                ->multiple()
//                ->relationship('games', fn ($query) => $query->with(['teamA', 'teamB']))
//                ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->teamA?->name} vs {$record->teamB?->name} ({$record->date})")
//                ->preload()
//                ->searchable(),
            Select::make('games')
                ->label('Игры')
                ->multiple()
                ->relationship('games', 'id')
                ->preload(),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Название')->searchable()->sortable(),
                TextColumn::make('start_date')->label('Начало')->date(),
                TextColumn::make('end_date')->label('Конец')->date(),
                TextColumn::make('location')->label('Локация')->searchable(),
                TextColumn::make('teams_count')->counts('teams')->label('Команд'),
                TextColumn::make('games_count')->counts('games')->label('Игр'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Можно добавить RelationManager для команд или игр
        ];
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
