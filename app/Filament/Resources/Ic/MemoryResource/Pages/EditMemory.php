<?php

namespace App\Filament\Resources\Ic\MemoryResource\Pages;

use App\Filament\Resources\Ic\MemoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemory extends EditRecord
{
    protected static string $resource = MemoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
