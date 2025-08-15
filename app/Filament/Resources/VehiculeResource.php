<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiculeResource\Pages;
use App\Filament\Resources\VehiculeResource\RelationManagers;
use App\Models\Vehicule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class VehiculeResource extends Resource
{
    protected static ?string $model = Vehicule::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Nouveau véhicule')
                ->description('Prise en charge des véhicules, entrer toutes les informations nécessaires.')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('marque')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('modele')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\TextInput::make('immatriculation')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('num_flotte')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\TextInput::make('type')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\TextInput::make('annee')
                                ->numeric()
                                ->default(null),
                            Forms\Components\TextInput::make('num_chassis')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\Select::make('device_id')
                                ->label('Device')
                                ->relationship('device', 'nom')
                                ->searchable()
                                ->required()
                                ->preload()
                                ->default(null),
                            Forms\Components\Select::make('client_id')
                                ->label('Client')
                                ->relationship('client', 'nom')
                                ->searchable()
                                ->required()
                                ->preload()
                                ->default(null),
                            Forms\Components\Toggle::make('actif')
                                ->required(),
                        ])                   
                    ]),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marque')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modele')
                    ->searchable(),
                Tables\Columns\TextColumn::make('immatriculation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('num_flotte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('annee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('num_chassis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_id')
                    ->sortable(),
                Tables\Columns\IconColumn::make('actif')
                    ->boolean(),
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
            'index' => Pages\ListVehicules::route('/'),
            'create' => Pages\CreateVehicule::route('/create'),
            'view' => Pages\ViewVehicule::route('/{record}'),
            'edit' => Pages\EditVehicule::route('/{record}/edit'),
        ];
    }
}
