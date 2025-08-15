<?php

namespace App\Filament\Resources\ConsommationDataResource\Pages;

use App\Filament\Resources\ConsommationDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsommationData extends ListRecords
{
    protected static string $resource = ConsommationDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
