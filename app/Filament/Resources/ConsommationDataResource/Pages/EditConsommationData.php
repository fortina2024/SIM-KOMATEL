<?php

namespace App\Filament\Resources\ConsommationDataResource\Pages;

use App\Filament\Resources\ConsommationDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsommationData extends EditRecord
{
    protected static string $resource = ConsommationDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
