<?php

namespace App\Filament\Resources\Ic\MemoryResource\Pages;

use Filament\Actions;
use App\Helpers\BsHelper;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Ic\MemoryResource;

class CreateMemory extends CreateRecord
{
    protected static string $resource = MemoryResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['ic_categorie_id'] = BsHelper::getAutoCategoryId('Memory');
        return $data;
    }
}
