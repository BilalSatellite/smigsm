<?php

namespace App\Filament\Resources\Ic\IcBrandResource\Pages;

use App\Filament\Resources\Ic\IcBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcBrands extends ListRecords
{
    protected static string $resource = IcBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
