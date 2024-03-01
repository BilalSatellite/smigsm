<?php

namespace App\Filament\Resources\Ic\ProcessorResource\Pages;

use App\Filament\Resources\Ic\ProcessorResource;
use App\Helpers\BsHelper;


use Filament\Resources\Pages\CreateRecord;

class CreateProcessor extends CreateRecord
{
    protected static string $resource = ProcessorResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {


        // dd($data);
        $data['user_id'] = auth()->id();
        $data['ic_categorie_id'] = BsHelper::getAutoCategoryId('Processor');
        return $data;
    }
}
