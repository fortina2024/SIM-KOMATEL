<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimResource\Pages;
use App\Filament\Resources\SimResource\RelationManagers;
use App\Models\Sim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class SimResource extends Resource
{
    protected static ?string $model = Sim::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Sims fonctionnelles')
                ->description('Prise en charge des sims, entrer toutes les informations nécessaires.')
                ->schema([
                    Grid::make(3)
            ->schema([
                Forms\Components\TextInput::make('msisdn')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('iccid')
                    ->maxLength(255)
                    ->required()
                    ->default(null),
                Forms\Components\TextInput::make('bundel')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Select::make('profil_sim_id')
                    ->label('Profil')
                    ->relationship('profil_sim', 'type')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('operateur_id')
                    ->label('Operateur')
                    ->relationship('operateur', 'nom')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->default(null),
                Forms\Components\Select::make('zone_operation_id')
                    ->label('Zone d\'operation')
                    ->relationship('zone_operation', 'disponibilite')
                    ->searchable()
                    ->preload()
                    ->default(null),
                Forms\Components\DatePicker::make('date_activation'),
                Forms\Components\DatePicker::make('date_expiration'),
                ])                   
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('msisdn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('iccid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bundel')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('profil_sim_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('operateur_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('zone_operation_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_activation')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_expiration')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListSims::route('/'),
            'create' => Pages\CreateSim::route('/create'),
            'view' => Pages\ViewSim::route('/{record}'),
            'edit' => Pages\EditSim::route('/{record}/edit'),
        ];
    }
}
