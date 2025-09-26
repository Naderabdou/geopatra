<?php

namespace App\Filament\Resources\JoinResource\Pages;

use App\Filament\Resources\JoinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJoin extends EditRecord
{
    protected static string $resource = JoinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
