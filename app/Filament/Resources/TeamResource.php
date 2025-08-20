<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\Team;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
//use Filament\Resources\Form as ResourceForm;
//use Filament\Resources\Table as ResourceTable;


class TeamResource extends Resource
{
    protected static ?string $model = Team::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Команды';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->unique(ignoreRecord: true)->label('Название'),
            Forms\Components\TextInput::make('city')->label('Город'),
            Forms\Components\TextInput::make('players_count')->label('Кол-во игроков')->numeric(),
            Forms\Components\TextInput::make('wins')->label('Победы')->numeric(),
            Forms\Components\TextInput::make('losses')->label('Поражения')->numeric(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Название'),
            Tables\Columns\TextColumn::make('city')->label('Город'),
            Tables\Columns\TextColumn::make('players_count')->label('Игроки')->sortable(),
            Tables\Columns\TextColumn::make('wins')->label('Победы'),
            Tables\Columns\TextColumn::make('losses')->label('Поражения'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Создано'),
        ])->filters([])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
//        return [
//            RelationManagers\PlayersRelationManager::class,
//        ];
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
