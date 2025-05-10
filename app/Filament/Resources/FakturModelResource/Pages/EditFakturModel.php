<?php

namespace App\Filament\Resources\FakturModelResource\Pages;

use App\Filament\Resources\FakturModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFakturModel extends EditRecord
{
    protected static string $resource = FakturModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
