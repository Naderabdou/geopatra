<?php

namespace App\Filament\Resources\OurValueResource\Pages;

use App\Filament\Resources\OurValueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOurValue extends CreateRecord
{
    protected static string $resource = OurValueResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Our Value Created Successfully');
    }
}
