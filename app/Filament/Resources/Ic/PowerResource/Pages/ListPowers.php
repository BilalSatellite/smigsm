<?php

namespace App\Filament\Resources\Ic\PowerResource\Pages;

use App\Filament\Resources\Ic\PowerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPowers extends ListRecords
{
    protected static string $resource = PowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
