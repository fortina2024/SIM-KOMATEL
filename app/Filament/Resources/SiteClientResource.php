<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteClientResource\Pages;
use App\Filament\Resources\SiteClientResource\RelationManagers;
use App\Models\SiteClient;
use CommerceGuys\Addressing\Country\CountryRepository;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteClientResource extends Resource
{
    protected static ?string $model = SiteClient::class;

    protected static ?string $navigationIcon = '';

    protected static ?string $navigationGroup = 'Gestion des clients';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        $countries = (new CountryRepository())->getList();
        
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('pays')
                    ->label('Pays')
                    ->required()
                    ->options($countries)
                    ->preload()
                    ->searchable(),
                Forms\Components\Select::make('client_id')
                    ->label('Client')
                    ->relationship('client', 'nom') // 👈 relation + colonne à afficher
                    ->searchable()
                    ->preload()
                    ->required(),
                ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('pays')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('client.nom')
                ->label('Client')
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
            'index' => Pages\ListSiteClients::route('/'),
            'create' => Pages\CreateSiteClient::route('/create'),
            'view' => Pages\ViewSiteClient::route('/{record}'),
            'edit' => Pages\EditSiteClient::route('/{record}/edit'),
        ];
    }
}
