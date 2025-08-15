<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsommationDataResource\Pages;
use App\Filament\Resources\ConsommationDataResource\RelationManagers;
use App\Models\ConsommationData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class ConsommationDataResource extends Resource
{
    protected static ?string $model = ConsommationData::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Connsommation datas')
                ->schema([
                    Grid::make(3)
            ->schema([
                Forms\Components\Select::make('sim_id')
                    ->label('Numéro sim')
                    ->relationship('sim', 'msisdn')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('device_id')
                    ->label('Device')
                    ->relationship('device', 'nom')
                    ->searchable()
                    ->preload()
                    ->default(null),
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('volume_mb')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('volume_total_mb')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(50)
                    ->default('data'),
                ])                   
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sim_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('device_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('volume_mb')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('volume_total_mb')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsommationData::route('/'),
            'create' => Pages\CreateConsommationData::route('/create'),
            'view' => Pages\ViewConsommationData::route('/{record}'),
            'edit' => Pages\EditConsommationData::route('/{record}/edit'),
        ];
    }
}
