<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\AssetClient;
use App\Models\Client;
use CommerceGuys\Addressing\Country\CountryRepository;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action; // ✅ Action pour les tableaux

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Gestion des clients';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $countries = (new CountryRepository())->getList();

        return $form
        ->schema([
            Section::make('Nouveau client')
                ->schema([
                    Grid::make(2)
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->tel()
                    ->maxLength(20)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('pays')
                    ->label('Pays')
                    ->required()
                    ->options($countries)
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('identifiant')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Toggle::make('actif')
                    ->required(),
                ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->icon('heroicon-s-envelope')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pays')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identifiant')
                    ->searchable(),
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
                /*Action::make('voir_assets')
                ->label('Voir les assets')
                ->url(fn ($record) => route('filament.admin.resources.asset-clients.index', [
                    'tableFilters[client_id][value]' => $record->id,
                ]))
                ->icon('heroicon-o-eye')
                ->color('secondary'),*/
                                
                Action::make('voir_assets')
                ->label('Voir les assets')
                ->url(fn ($record) => route('filament.admin.resources.asset-clients.clientAssets', [
                    'client' => $record->id,
                ]))
                ->icon('heroicon-o-eye')
                ->color('primary')

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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
