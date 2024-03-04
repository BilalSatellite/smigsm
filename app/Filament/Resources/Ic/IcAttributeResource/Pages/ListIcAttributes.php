<?php

namespace App\Filament\Resources\Ic\IcAttributeResource\Pages;

use App\Filament\Resources\Ic\IcAttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcAttributes extends ListRecords
{
    protected static string $resource = IcAttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
