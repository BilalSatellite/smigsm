<?php

namespace App\Filament\Resources\Ic\BrandIcResource\Pages;

use App\Filament\Resources\Ic\BrandIcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrandIcs extends ListRecords
{
    protected static string $resource = BrandIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
