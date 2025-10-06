<?php

namespace App\Filament\Resources\Laborans;

use App\Filament\Resources\Laborans\Pages\CreateLaboran;
use App\Filament\Resources\Laborans\Pages\EditLaboran;
use App\Filament\Resources\Laborans\Pages\ListLaborans;
use App\Filament\Resources\Laborans\Schemas\LaboranForm;
use App\Filament\Resources\Laborans\Tables\LaboransTable;
use App\Models\Laboran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class LaboranResource extends Resource
{
    protected static ?string $model = Laboran::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Lab';
    
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return LaboranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaboransTable::configure($table);
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
            'index' => ListLaborans::route('/'),
            'create' => CreateLaboran::route('/create'),
            'edit' => EditLaboran::route('/{record}/edit'),
        ];
    }
}
