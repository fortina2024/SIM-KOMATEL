<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AssetClientResource\Pages;
use App\Filament\Resources\AssetClientResource\RelationManagers;
use App\Models\AssetClient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetClientResource extends Resource
{
    protected static ?string $model = AssetClient::class;

    protected static ?string $navigationLabel = 'Client-Assets';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected ?\App\Models\Client $client = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marque')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('immatriculation')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('numero_flotte')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('type_asset.description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('annee_fab')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('actif')
                    ->boolean()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('device.marque')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('site_client.nom')
                    ->label('Site')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('device.date_mise_en_service_device')
                    ->label('Date Inst Device')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('device.parc_de_sim.msisdn')
                    ->label('Sim')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('device.parc_de_sim.date_mise_en_service')
                    ->label('Date Activation')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('client.nom')
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
                SelectFilter::make('client_id')
                    ->label('Client')
                    ->relationship('client', 'nom'),

            ])
            ->actions([
                /*Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),*/
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
            'index' => Pages\ListAssetClients::route('/'),
            'create' => Pages\CreateAssetClient::route('/create'),
            'view' => Pages\ViewAssetClient::route('/{record}'),
            'edit' => Pages\EditAssetClient::route('/{record}/edit'),
            'clientAssets' => Pages\ClientAssets::route('/client/{client}'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // tu ne mets rien ici → donc aucun bouton "New"
        ];
    }

    protected function getClient(): \App\Models\Client
    {
        return $this->client ??= \App\Models\Client::findOrFail($this->getClientId());
    }
    
    protected function getTitle(): string
    {
        return 'Assets de'. $this->getClient()->name;
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    protected function getHeading(): string
    {
        return 'Liste des Utilisateurs';
    }
   
}
