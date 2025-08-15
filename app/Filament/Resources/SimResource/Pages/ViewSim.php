<?php

namespace App\Filament\Resources\SimResource\Pages;

use App\Filament\Resources\SimResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSim extends ViewRecord
{
    protected static string $resource = SimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
