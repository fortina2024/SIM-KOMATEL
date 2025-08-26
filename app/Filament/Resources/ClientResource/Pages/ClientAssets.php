<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\Client;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;

class ClientAssets extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = ClientResource::class;

    protected static string $view = 'filament.resources.client-resource.pages.client-assets';

    public Client $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->client->assets()->getQuery())
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('marque')->label('Asset'),
                Tables\Columns\TextColumn::make('immatriculation'),
            ]);
    }
}
