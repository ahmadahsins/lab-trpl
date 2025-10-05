<?php

namespace App\Filament\Resources\BidangKeahlians\Pages;

use App\Filament\Resources\BidangKeahlians\BidangKeahlianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBidangKeahlian extends EditRecord
{
    protected static string $resource = BidangKeahlianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
