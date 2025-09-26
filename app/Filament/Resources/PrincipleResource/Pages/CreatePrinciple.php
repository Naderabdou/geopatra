<?php

namespace App\Filament\Resources\PrincipleResource\Pages;

use App\Filament\Resources\PrincipleResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePrinciple extends CreateRecord
{
    protected static string $resource = PrincipleResource::class;


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Principle Created Successfully');
    }
}
