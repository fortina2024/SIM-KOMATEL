<?php

namespace App\Filament\Resources\ZoneOperationResource\Pages;

use App\Filament\Resources\ZoneOperationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZoneOperation extends EditRecord
{
    protected static string $resource = ZoneOperationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
