<?php

namespace App\Filament\Resources\FakturModelResource\Pages;

use App\Filament\Resources\FakturModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFakturModel extends CreateRecord
{
    protected static string $resource = FakturModelResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
