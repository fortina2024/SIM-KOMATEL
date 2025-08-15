<?php

namespace App\Filament\Resources\OperateurResource\Pages;

use App\Filament\Resources\OperateurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperateur extends EditRecord
{
    protected static string $resource = OperateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
