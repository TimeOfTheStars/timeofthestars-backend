<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Команды';
    protected static ?string $pluralLabel = 'Команды';
    protected static ?string $modelLabel = 'Команда';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('city')
                    ->label('Город')
                    ->maxLength(255),

                TextInput::make('players_count')
                    ->label('Кол-во игроков')
                    ->numeric()
                    ->default(0),

                TextInput::make('wins')
                    ->label('Победы')
                    ->numeric()
                    ->default(0),

                TextInput::make('losses')
                    ->label('Поражения')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Название')->searchable()->sortable(),
                TextColumn::make('city')->label('Город')->searchable(),
                TextColumn::make('players_count')->label('Игроков')->sortable(),
                TextColumn::make('wins')->label('Победы')->sortable(),
                TextColumn::make('losses')->label('Поражения')->sortable(),
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
            // сюда можно добавить RelationManagers для championshipPlayers / tournamentPlayers
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
