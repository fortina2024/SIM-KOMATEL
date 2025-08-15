<?php

namespace App\Filament\Resources\ProfilSimResource\Pages;

use App\Filament\Resources\ProfilSimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilSim extends EditRecord
{
    protected static string $resource = ProfilSimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
