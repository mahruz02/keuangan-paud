<?php

namespace App\Filament\Resources\TagihanMuridResource\Pages;

use App\Filament\Resources\TagihanMuridResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagihanMurids extends ListRecords
{
    protected static string $resource = TagihanMuridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
