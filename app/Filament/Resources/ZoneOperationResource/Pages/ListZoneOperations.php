<?php

namespace App\Filament\Resources\ZoneOperationResource\Pages;

use App\Filament\Resources\ZoneOperationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZoneOperations extends ListRecords
{
    protected static string $resource = ZoneOperationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
