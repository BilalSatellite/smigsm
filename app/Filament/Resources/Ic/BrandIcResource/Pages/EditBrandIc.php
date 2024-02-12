<?php

namespace App\Filament\Resources\Ic\BrandIcResource\Pages;

use App\Filament\Resources\Ic\BrandIcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrandIc extends EditRecord
{
    protected static string $resource = BrandIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
