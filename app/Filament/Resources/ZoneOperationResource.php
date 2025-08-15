<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZoneOperationResource\Pages;
use App\Filament\Resources\ZoneOperationResource\RelationManagers;
use App\Models\ZoneOperation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class ZoneOperationResource extends Resource
{
    protected static ?string $model = ZoneOperation::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Nouvelle zone d\'opérations')
                ->schema([
                    Forms\Components\TextInput::make('disponibilite')
                        ->required(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('disponibilite'),
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
            'index' => Pages\ListZoneOperations::route('/'),
            'create' => Pages\CreateZoneOperation::route('/create'),
            'view' => Pages\ViewZoneOperation::route('/{record}'),
            'edit' => Pages\EditZoneOperation::route('/{record}/edit'),
        ];
    }
}
