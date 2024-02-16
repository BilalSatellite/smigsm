<?php

namespace App\Filament\Resources\Ic\SubCategorieIcResource\Pages;

use App\Filament\Resources\Ic\SubCategorieIcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubCategorieIcs extends ListRecords
{
    protected static string $resource = SubCategorieIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
