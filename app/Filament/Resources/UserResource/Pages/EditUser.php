<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'User Updated';
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    // protected function afterSave(array $data): array
    // {
    //     dd('jj');
    //     if (User::find($data['id'])->hasRole('Admin')) {
    //     }
    // }
    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     // dd(User::find($data['id'])->hasRole('Admin'));
    //     if (User::find($data['id'])->hasRole('Admin')) {
    //         $this->getResource()::getUrl('index');
    //     } else {
    //         return $data;
    //     }
    // }
}
