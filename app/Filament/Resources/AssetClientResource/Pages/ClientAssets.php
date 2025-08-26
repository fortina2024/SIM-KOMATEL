<?php

namespace App\Filament\Resources\AssetClientResource\Pages;

use App\Filament\Resources\AssetClientResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class ClientAssets extends ListRecords
{
    protected static string $resource = AssetClientResource::class;

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()?->where('client_id', $this->getClientId());
    }

    protected function getClientId(): int
    {
        return (int) request()->route('client');
    }

    /*protected function getTitle(): string | Htmlable | null
    {
        return 'Tous les assets';
    }*/

}



