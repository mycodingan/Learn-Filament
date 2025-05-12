<?php

namespace App\Filament\Resources\DetailFakturResource\Pages;

use App\Filament\Resources\DetailFakturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailFakturs extends ListRecords
{
    protected static string $resource = DetailFakturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
