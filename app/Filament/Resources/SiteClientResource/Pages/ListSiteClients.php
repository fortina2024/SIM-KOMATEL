<?php

namespace App\Filament\Resources\SiteClientResource\Pages;

use App\Filament\Resources\SiteClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteClients extends ListRecords
{
    protected static string $resource = SiteClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
