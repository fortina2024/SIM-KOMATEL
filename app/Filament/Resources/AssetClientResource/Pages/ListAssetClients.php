<?php

namespace App\Filament\Resources\AssetClientResource\Pages;

use App\Filament\Resources\AssetClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetClients extends ListRecords
{
    protected static string $resource = AssetClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),
        ];
    }
    
}
