<?php

namespace App\Filament\Resources\SiteClientResource\Pages;

use App\Filament\Resources\SiteClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSiteClient extends ViewRecord
{
    protected static string $resource = SiteClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
