<?php

namespace App\Filament\Resources\AssetClientResource\Pages;

use App\Filament\Resources\AssetClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetClient extends EditRecord
{
    protected static string $resource = AssetClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
