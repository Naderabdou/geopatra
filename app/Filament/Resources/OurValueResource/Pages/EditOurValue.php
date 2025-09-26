<?php

namespace App\Filament\Resources\OurValueResource\Pages;

use App\Filament\Resources\OurValueResource;
use Filament\Resources\Pages\EditRecord;

class EditOurValue extends EditRecord
{
    protected static string $resource = OurValueResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Our Value Updated Successfully');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
