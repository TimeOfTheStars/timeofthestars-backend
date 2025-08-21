<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;
    protected static ?string $navigationIcon = 'heroicon-o-play';
    protected static ?string $navigationLabel = 'Игры';
    protected static ?string $pluralLabel = 'Игры';
    protected static ?string $modelLabel = 'Игра';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('team_a_id')
                    ->label('Команда A')
                    ->relationship('teamA', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('team_b_id')
                    ->label('Команда B')
                    ->relationship('teamB', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                DatePicker::make('date')
                    ->label('Дата')
                    ->required()
                    ->native(false),

                TimePicker::make('time')
                    ->label('Время')
                    ->required()
                    ->native(false),

                TextInput::make('location')
                    ->label('Место проведения')
                    ->maxLength(255),

                TextInput::make('score')
                    ->label('Счёт')
                    ->placeholder('например 2:1'),

                Select::make('tournaments')
                    ->label('Турниры')
                    ->multiple()
                    ->relationship('tournaments', 'name')
                    ->preload(),

                Select::make('championships')
                    ->label('Чемпионаты')
                    ->multiple()
                    ->relationship('championships', 'name')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('teamA.name')->label('Команда A')->sortable()->searchable(),
                TextColumn::make('teamB.name')->label('Команда B')->sortable()->searchable(),
                TextColumn::make('date')->label('Дата')->date(),
                TextColumn::make('time')->label('Время'),
                TextColumn::make('location')->label('Локация')->limit(20),
                TextColumn::make('score')->label('Счёт'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
