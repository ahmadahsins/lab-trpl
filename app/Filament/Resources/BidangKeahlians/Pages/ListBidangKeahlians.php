<?php

namespace App\Filament\Resources\BidangKeahlians\Pages;

use App\Filament\Resources\BidangKeahlians\BidangKeahlianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBidangKeahlians extends ListRecords
{
    protected static string $resource = BidangKeahlianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
