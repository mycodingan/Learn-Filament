<?php

namespace App\Filament\Resources\DetailFakturResource\Pages;

use App\Filament\Resources\DetailFakturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailFaktur extends EditRecord
{
    protected static string $resource = DetailFakturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
