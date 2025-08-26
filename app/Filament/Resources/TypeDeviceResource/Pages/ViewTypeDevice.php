<?php

namespace App\Filament\Resources\TypeDeviceResource\Pages;

use App\Filament\Resources\TypeDeviceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTypeDevice extends ViewRecord
{
    protected static string $resource = TypeDeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
