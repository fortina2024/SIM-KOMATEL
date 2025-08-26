<?php

namespace App\Filament\Resources\SiteClientResource\Pages;

use App\Filament\Resources\SiteClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteClient extends EditRecord
{
    protected static string $resource = SiteClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
