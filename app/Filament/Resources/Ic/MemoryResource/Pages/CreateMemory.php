<?php

namespace App\Filament\Resources\Ic\MemoryResource\Pages;

use App\Filament\Resources\Ic\MemoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMemory extends CreateRecord
{
    protected static string $resource = MemoryResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        $data['user_id'] = auth()->id();
        return $data;
    }
}
