<?php

namespace App\Filament\Resources\Ic\PowerResource\Pages;

use App\Filament\Resources\Ic\PowerResource;
use App\Helpers\BsHelper;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePower extends CreateRecord
{
    protected static string $resource = PowerResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['ic_categorie_id'] = BsHelper::getAutoCategoryId('Power');
        return $data;
    }
}
