<?php

namespace App\Filament\Resources\FakturModelResource\Pages;

use App\Filament\Resources\FakturModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFakturModels extends ListRecords
{
    protected static string $resource = FakturModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
