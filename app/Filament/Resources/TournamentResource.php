<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Tournament;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;
    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Турниры';
    protected static ?string $pluralLabel = 'Турниры';
    protected static ?string $modelLabel = 'Турнир';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Название турнира')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->label('Дата начала')
                    ->native(false),

                DatePicker::make('end_date')
                    ->label('Дата окончания')
                    ->native(false)
                    ->after('start_date'),

                TextInput::make('location')
                    ->label('Место проведения')
                    ->maxLength(255),

                Select::make('teams')
                    ->label('Команды')
                    ->multiple()
                    ->relationship('teams', 'name')
                    ->preload(),

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
                TextColumn::make('name')->label('Название')->searchable(),
                TextColumn::make('start_date')->label('Начало')->date(),
                TextColumn::make('end_date')->label('Окончание')->date(),
                TextColumn::make('location')->label('Локация')->searchable(),
                TextColumn::make('teams.name')->label('Команды')->badge()->limit(3),
                TextColumn::make('games.title')->label('Игры')->badge()->limit(3),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->label('Активные')
                    ->query(fn ($query) => $query->where('start_date', '<=', now())
                        ->where('end_date', '>=', now())),
            ])
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
            'index' => TournamentResource\Pages\ListTournaments::route('/'),
            'create' => TournamentResource\Pages\CreateTournament::route('/create'),
            'edit' => TournamentResource\Pages\EditTournament::route('/{record}/edit'),
        ];
    }
}
