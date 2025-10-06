<?php

namespace App\Filament\Resources\Proyeks;

use App\Filament\Resources\Proyeks\Pages\CreateProyek;
use App\Filament\Resources\Proyeks\Pages\EditProyek;
use App\Filament\Resources\Proyeks\Pages\ListProyeks;
use App\Filament\Resources\Proyeks\Pages\ViewProyek;
use App\Filament\Resources\Proyeks\Schemas\ProyekForm;
use App\Filament\Resources\Proyeks\Tables\ProyeksTable;
use App\Models\Proyek;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document';
    
    protected static ?string $recordRouteKeyName = 'id';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Proyek';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ProyekForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProyeksTable::configure($table);
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
            'index' => ListProyeks::route('/'),
            'create' => CreateProyek::route('/create'),
            'view' => ViewProyek::route('/{record}'),
            'edit' => EditProyek::route('/{record}/edit'),
        ];
    }
}
