<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilSimResource\Pages;
use App\Filament\Resources\ProfilSimResource\RelationManagers;
use App\Models\ProfilSim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class ProfilSimResource extends Resource
{
    protected static ?string $model = ProfilSim::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Nouveau profile sim')
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(50),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListProfilSims::route('/'),
            'create' => Pages\CreateProfilSim::route('/create'),
            'view' => Pages\ViewProfilSim::route('/{record}'),
            'edit' => Pages\EditProfilSim::route('/{record}/edit'),
        ];
    }
}
