<?php

namespace App\Filament\Resources\Ic\IcCategoryResource\Pages;

use App\Filament\Resources\Ic\IcCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcCategories extends ListRecords
{
    protected static string $resource = IcCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
