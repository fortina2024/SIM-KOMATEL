<?php

namespace App\Filament\Resources\TypeAssetResource\Pages;

use App\Filament\Resources\TypeAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeAsset extends EditRecord
{
    protected static string $resource = TypeAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
