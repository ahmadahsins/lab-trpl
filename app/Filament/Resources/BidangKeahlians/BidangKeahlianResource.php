<?php

namespace App\Filament\Resources\BidangKeahlians;

use App\Filament\Resources\BidangKeahlians\Pages\CreateBidangKeahlian;
use App\Filament\Resources\BidangKeahlians\Pages\EditBidangKeahlian;
use App\Filament\Resources\BidangKeahlians\Pages\ListBidangKeahlians;
use App\Filament\Resources\BidangKeahlians\Schemas\BidangKeahlianForm;
use App\Filament\Resources\BidangKeahlians\Tables\BidangKeahliansTable;
use App\Models\BidangKeahlian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class BidangKeahlianResource extends Resource
{
    protected static ?string $model = BidangKeahlian::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BidangKeahlianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BidangKeahliansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBidangKeahlians::route('/'),
            'create' => CreateBidangKeahlian::route('/create'),
            'edit' => EditBidangKeahlian::route('/{record}/edit'),
        ];
    }
}
