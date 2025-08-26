<?php

namespace App\Filament\Resources\TypeAssetResource\Pages;

use App\Filament\Resources\TypeAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeAssets extends ListRecords
{
    protected static string $resource = TypeAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
