<?php

namespace App\Filament\Resources\Ic\TypeIcResource\Pages;

use App\Filament\Resources\Ic\TypeIcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeIc extends EditRecord
{
    protected static string $resource = TypeIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
