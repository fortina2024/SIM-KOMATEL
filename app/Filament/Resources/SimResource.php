<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\SimResource\Pages;
use App\Filament\Resources\SimResource\RelationManagers;
use App\Models\ParcDeSim;
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
    protected static ?string $model = ParcDeSim::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Sims opérationnelles')
                ->description('Prise en charge des sims, entrez toutes les informations nécessaires.')
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
                Forms\Components\TextInput::make('imsi')
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
                    ->label('Opérateur')
                    ->relationship('operateur', 'nom')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->default(null),
                Forms\Components\Select::make('bundel_id')
                    ->label('Bundel')
                    ->relationship('bundel', 'nom')
                    ->searchable()
                    ->preload()
                    ->default(null),
                Forms\Components\DatePicker::make('date_activation'),
                Forms\Components\DatePicker::make('date_mise_en_service'),
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
                Tables\Columns\TextColumn::make('imsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bundel.nom')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('profil_sim.type')
                    ->label('ProfiSim')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('operateur.nom')
                    ->label('Operateur')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_mise_en_service')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_activation')
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
                    FilamentExportBulkAction::make('export'),
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
