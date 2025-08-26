<?php

namespace App\Filament\Resources\TypeAssetResource\Pages;

use App\Filament\Resources\TypeAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTypeAsset extends ViewRecord
{
    protected static string $resource = TypeAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
