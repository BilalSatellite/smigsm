<?php

namespace App\Filament\Resources\Ic\CategorieIcResource\Pages;

use App\Filament\Resources\Ic\CategorieIcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategorieIc extends EditRecord
{
    protected static string $resource = CategorieIcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
