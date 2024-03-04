<?php

namespace App\Filament\Resources\Ic\IcTypeResource\Pages;

use App\Filament\Resources\Ic\IcTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcType extends EditRecord
{
    protected static string $resource = IcTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
