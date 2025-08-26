<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\OperateurResource\Pages;
use App\Filament\Resources\OperateurResource\RelationManagers;
use App\Models\Operateur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use CommerceGuys\Addressing\Country\CountryRepository;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class OperateurResource extends Resource
{
    protected static ?string $model = Operateur::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        $countries = (new CountryRepository())->getList();

        return $form
        ->schema([
            Section::make('Nouvel opérateur')
                ->schema([
                    Grid::make(2)
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone_1')
                    ->tel()
                    ->maxLength(20)
                    ->default(null),
                Forms\Components\TextInput::make('email_1')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('telephone_2')
                    ->tel()
                    ->maxLength(20)
                    ->default(null),
                Forms\Components\TextInput::make('email_2')
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
            ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone_1')
                    ->icon('heroicon-s-phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_1')
                    ->icon('heroicon-s-envelope')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone_2')
                    ->icon('heroicon-s-phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_2')
                    ->icon('heroicon-s-envelope')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pays')
                    ->label('Pays')
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
            'index' => Pages\ListOperateurs::route('/'),
            'create' => Pages\CreateOperateur::route('/create'),
            'view' => Pages\ViewOperateur::route('/{record}'),
            'edit' => Pages\EditOperateur::route('/{record}/edit'),
        ];
    }

}
