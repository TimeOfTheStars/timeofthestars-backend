<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Models\Player;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Игроки';
    protected static ?string $pluralLabel = 'Игроки';
    protected static ?string $modelLabel = 'Игрок';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')
                    ->label('ФИО')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('birth_date')
                    ->label('Дата рождения')
                    ->native(false),

                Select::make('position')
                    ->label('Амплуа')
                    ->options([
                        'goalkeeper' => 'Вратарь',
                        'defender' => 'Защитник',
                        'midfielder' => 'Полузащитник',
                        'forward' => 'Нападающий',
                    ])
                    ->searchable(),

                Select::make('grip')
                    ->label('Хват')
                    ->options([
                        'left' => 'Левый',
                        'right' => 'Правый',
                    ])
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('full_name')->label('ФИО')->searchable()->sortable(),
                TextColumn::make('birth_date')->label('Дата рождения')->date(),
                TextColumn::make('position')->label('Амплуа')->sortable(),
                TextColumn::make('grip')->label('Хват'),
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
            // сюда позже добавим RelationManager для championships / tournaments
        ];
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
