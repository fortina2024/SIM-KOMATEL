<?php

namespace App\Filament\Resources\ProfilSimResource\Pages;

use App\Filament\Resources\ProfilSimResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProfilSim extends ViewRecord
{
    protected static string $resource = ProfilSimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
