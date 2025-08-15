<?php

namespace App\Filament\Resources\ProfilSimResource\Pages;

use App\Filament\Resources\ProfilSimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilSims extends ListRecords
{
    protected static string $resource = ProfilSimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
