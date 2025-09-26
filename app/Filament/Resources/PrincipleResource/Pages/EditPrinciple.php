<?php

namespace App\Filament\Resources\PrincipleResource\Pages;

use App\Filament\Resources\PrincipleResource;
use Filament\Resources\Pages\EditRecord;

class EditPrinciple extends EditRecord
{
    protected static string $resource = PrincipleResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Principle Updated Successfully');
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
