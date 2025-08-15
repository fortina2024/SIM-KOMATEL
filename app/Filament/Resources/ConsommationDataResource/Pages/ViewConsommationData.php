<?php

namespace App\Filament\Resources\ConsommationDataResource\Pages;

use App\Filament\Resources\ConsommationDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConsommationData extends ViewRecord
{
    protected static string $resource = ConsommationDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
