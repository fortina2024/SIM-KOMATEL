<?php

namespace App\Filament\Resources\OperateurResource\Pages;

use App\Filament\Resources\OperateurResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOperateur extends ViewRecord
{
    protected static string $resource = OperateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
