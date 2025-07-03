<?php

namespace App\Filament\Resources\TransaksiKasResource\Pages;

use App\Filament\Resources\TransaksiKasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksiKas extends ListRecords
{
    protected static string $resource = TransaksiKasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
