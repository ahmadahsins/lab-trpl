<?php

namespace App\Filament\Resources\BidangKeahlians\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BidangKeahlianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_bidang')
                    ->label('Nama Bidang Keahlian')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
