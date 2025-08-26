<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\DeviceResource\Pages;
use App\Filament\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-tablet';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Device fonctionnel')
                ->description('Prise en charge des devices, entrer toutes les informations nécessaires.')
                ->schema([
                    Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('nom')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('marque')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('imei')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('numero_serie')
                        ->label('Numéro série')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\Select::make('type_device_id')
                        ->relationship('type_device', 'description')
                        ->default(null),
                    Forms\Components\Select::make('parc_de_sim_id')
                        ->label('Numéro sim')
                        ->relationship('parc_de_sim', 'iccid')
                        ->default(null),
                    Forms\Components\Toggle::make('active')
                        ->required(),
                    Forms\Components\DatePicker::make('date_mise_en_service_device'),
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
                Tables\Columns\TextColumn::make('marque')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imei')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_serie')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_device.description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parc_de_sim.iccid')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_mise_en_service_device')
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'view' => Pages\ViewDevice::route('/{record}'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
