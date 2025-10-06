<?php

namespace App\Filament\Resources\Proyeks\Pages;

use App\Filament\Resources\Proyeks\ProyekResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProyek extends ViewRecord
{
    protected static string $resource = ProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
