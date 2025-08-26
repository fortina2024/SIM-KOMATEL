<?php

namespace App\Filament\Resources\AssetClientResource\Pages;

use App\Filament\Resources\AssetClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetClient extends ViewRecord
{
    protected static string $resource = AssetClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
