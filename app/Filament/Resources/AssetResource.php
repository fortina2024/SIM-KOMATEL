<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AssetResource\Pages;
use App\Filament\Resources\AssetResource\RelationManagers;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = '';

    protected static ?string $navigationGroup = 'Gestion des clients';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Asset')
                ->description('Prise en charge des véhicules, entrer toutes les informations nécessaires.')
                ->schema([
                    Grid::make(3)
                ->schema([
                    Forms\Components\Select::make('marque')
                        ->options([
                            'Véhicules' => [
                                'Acura' => 'Acura',
                                'Alfa Romeo' => 'Alfa Romeo',
                                'Audi' => 'Audi',
                                'BMW' => 'BMW',
                                'BYD' => 'BYD',
                                'Chevrolet' => 'Chevrolet',
                                'Chery' => 'Chery',
                                'Chrysler' => 'Chrysler',
                                'Citroën' => 'Citroën',
                                'Dacia' => 'Dacia',
                                'Dodge' => 'Dodge',
                                'Fiat' => 'Fiat',
                                'Ford' => 'Ford',
                                'GMC' => 'GMC',
                                'Great Wall' => 'Great Wall',
                                'Honda' => 'Honda',
                                'Haval' => 'Haval',
                                'Hyundai' => 'Hyundai',
                                'Infiniti' => 'Infiniti',
                                'Iveco' => 'Iveco',
                                'Jaguar' => 'Jaguar',
                                'Jeep' => 'Jeep',
                                'Kia' => 'Kia',
                                'Land Rover' => 'Land Rover',
                                'Lexus' => 'Lexus',
                                'Mahindra' => 'Mahindra',
                                'Mazda' => 'Mazda',
                                'Mercedes-Benz' => 'Mercedes-Benz',
                                'Mini' => 'Mini',
                                'Mitsubishi' => 'Mitsubishi',
                                'Nissan' => 'Nissan',
                                'Opel' => 'Opel',
                                'Peugeot' => 'Peugeot',
                                'Porsche' => 'Porsche',
                                'Ram' => 'Ram',
                                'Renault' => 'Renault',
                                'Seat' => 'Seat',
                                'Skoda' => 'Skoda',
                                'Subaru' => 'Subaru',
                                'Suzuki' => 'Suzuki',
                                'Tesla' => 'Tesla',
                                'Toyota' => 'Toyota',
                                'Volkswagen' => 'Volkswagen',
                                'Volvo' => 'Volvo',
                                'Autre' => 'Autre',
                                'Baojun' => 'Baojun',
                                'Chevy' => 'Chevy',
                            ],
                            'Bateaux' => [
                                'Bateau' => 'Bateau',
                                'Ferry' => 'Ferry',
                                'Péniche' => 'Péniche',
                                'Voilier' => 'Voilier',
                                'Yacht' => 'Yacht',
                            ],
                            'Grues & engins de chantier' => [
                                'Bulldozer' => 'Bulldozer',
                                'Chargeuse' => 'Chargeuse',
                                'Grue à tour' => 'Grue à tour',
                                'Grue mobile' => 'Grue mobile',
                                'Pelleteuse' => 'Pelleteuse',
                            ],
                            'Autres' => [
                                'Drone' => 'Drone',
                                'Moto' => 'Moto',
                                'Scooter' => 'Scooter',
                            ],
                        ])                                  
                        ->required(),
                    Forms\Components\TextInput::make('model')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('immatriculation')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('numero_flotte')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\Select::make('type_asset_id')
                        ->relationship('type_asset','description')
                        ->default(null),
                    Forms\Components\TextInput::make('annee_fab')
                        ->numeric()
                        ->default(null),
                    Forms\Components\Toggle::make('actif')
                        ->required(),
                    Forms\Components\Select::make('device_id')
                        ->relationship('device', 'imei')
                        ->preload()
                        ->default(null),
                    Forms\Components\Select::make('client_id')
                        ->relationship('client','nom')
                        ->reactive() 
                        ->default(null),
                    Forms\Components\Select::make('site_client_id')
                        ->relationship('site_client','nom')
                        ->options(function (callable $get) {
                            $clientId = $get('client_id');
                            if (!$clientId) return [];
                            return \App\Models\SiteClient::where('client_id', $clientId)
                            ->get()
                            ->mapWithKeys(function ($site) {
                                // clé = id, valeur = "nom (pays)"
                                return [$site->id => $site->nom . ' (' . $site->pays . ')'];
                            })->toArray();
                        })
                        ->preload()
                        ->searchable(),
                ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marque')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('immatriculation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_flotte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_asset.description')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('annee_fab')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('actif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('device.marque')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('client.nom')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_client.nom')
                    ->label('Site')
                    ->searchable()
                    ->toggleable(),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'view' => Pages\ViewAsset::route('/{record}'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
