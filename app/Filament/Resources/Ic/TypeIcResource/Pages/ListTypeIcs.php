<?php

namespace App\Filament\Resources\Ic\TypeIcResource\Pages;

use App\Filament\Resources\Ic\TypeIcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeIcs extends ListRecords
{
    protected static string $resource = TypeIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
