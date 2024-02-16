<?php

namespace App\Filament\Resources\Ic\SubCategorieIcResource\Pages;

use App\Filament\Resources\Ic\SubCategorieIcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubCategorieIc extends EditRecord
{
    protected static string $resource = SubCategorieIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
