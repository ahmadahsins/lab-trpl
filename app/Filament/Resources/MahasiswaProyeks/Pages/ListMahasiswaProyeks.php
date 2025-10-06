<?php

namespace App\Filament\Resources\MahasiswaProyeks\Pages;

use App\Filament\Resources\MahasiswaProyeks\MahasiswaProyekResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswaProyeks extends ListRecords
{
    protected static string $resource = MahasiswaProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
