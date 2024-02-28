<?php

namespace App\Filament\Resources\Ic\IcBrandResource\Pages;

use App\Filament\Resources\Ic\IcBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcBrand extends EditRecord
{
    protected static string $resource = IcBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
