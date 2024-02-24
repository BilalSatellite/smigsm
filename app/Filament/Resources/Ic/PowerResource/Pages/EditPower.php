<?php

namespace App\Filament\Resources\Ic\PowerResource\Pages;

use App\Filament\Resources\Ic\PowerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPower extends EditRecord
{
    protected static string $resource = PowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
