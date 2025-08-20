<?php

namespace App\Filament\Resources;

use App\Models\Player;
use App\Filament\Resources\PlayerResource\Pages;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;
    protected static ?string $navigationLabel = 'Игроки';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->required()->label('ФИО'),
            Forms\Components\DatePicker::make('birth_date')->label('Дата рождения'),
            Forms\Components\TextInput::make('position')->label('Амплуа'),
            Forms\Components\TextInput::make('grip')->label('Хват'),
            Forms\Components\Select::make('team_id')
                ->relationship('team', 'name')
                ->searchable()
                ->label('Команда'),
            Forms\Components\TextInput::make('matches')->numeric()->label('Матчи'),
            Forms\Components\TextInput::make('goals')->numeric()->label('Голы'),
            Forms\Components\TextInput::make('assists')->numeric()->label('Передачи'),
            Forms\Components\TextInput::make('penalties')->numeric()->label('Штрафы'),
            Forms\Components\TextInput::make('number')->numeric()->label('Номер'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
            Tables\Columns\TextColumn::make('full_name')->searchable()->label('ФИО'),
            Tables\Columns\TextColumn::make('team.name')->label('Команда'),
            Tables\Columns\TextColumn::make('goals')->label('Голы'),
            Tables\Columns\TextColumn::make('assists')->label('Передачи'),
            Tables\Columns\TextColumn::make('matches')->label('Матчи'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
