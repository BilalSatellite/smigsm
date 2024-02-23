<?php

namespace App\Filament\Resources\Ic\ProcessorResource\Pages;

use App\Filament\Resources\Ic\ProcessorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcessor extends EditRecord
{
    protected static string $resource = ProcessorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
