<?php

namespace App\Filament\Resources\TransaksiKasResource\Pages;

use App\Filament\Resources\TransaksiKasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiKas extends EditRecord
{
    protected static string $resource = TransaksiKasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
