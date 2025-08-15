<?php

namespace App\Filament\Resources\OperateurResource\Pages;

use App\Filament\Resources\OperateurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOperateurs extends ListRecords
{
    protected static string $resource = OperateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
