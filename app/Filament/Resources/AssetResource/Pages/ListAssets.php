<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Resources\Pages\Page;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssets extends ListRecords
{
    protected static string $resource = AssetResource::class;

   // protected static string $view = 'filament.resources.asset-resource.pages.list-assets';
   protected function getHeaderActions(): array
   {
       return [
          Actions\CreateAction::make(),
       ];
   }
}
