<?php

namespace App\Filament\Resources\Ic\MemoryResource\Pages;

use App\Filament\Resources\Ic\MemoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemories extends ListRecords
{
    protected static string $resource = MemoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
