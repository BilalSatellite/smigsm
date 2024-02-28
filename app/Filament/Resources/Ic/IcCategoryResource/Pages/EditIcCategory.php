<?php

namespace App\Filament\Resources\Ic\IcCategoryResource\Pages;

use App\Filament\Resources\Ic\IcCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcCategory extends EditRecord
{
    protected static string $resource = IcCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
