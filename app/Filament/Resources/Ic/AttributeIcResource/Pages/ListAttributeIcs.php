<?php

namespace App\Filament\Resources\Ic\AttributeIcResource\Pages;

use App\Filament\Resources\Ic\AttributeIcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributeIcs extends ListRecords
{
    protected static string $resource = AttributeIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
