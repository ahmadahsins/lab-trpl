<?php

namespace App\Filament\Resources\MahasiswaProyeks\Pages;

use App\Filament\Resources\MahasiswaProyeks\MahasiswaProyekResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMahasiswaProyek extends EditRecord
{
    protected static string $resource = MahasiswaProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
