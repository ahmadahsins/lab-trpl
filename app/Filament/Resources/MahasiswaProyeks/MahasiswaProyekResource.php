<?php

namespace App\Filament\Resources\MahasiswaProyeks;

use App\Filament\Resources\MahasiswaProyeks\Pages\CreateMahasiswaProyek;
use App\Filament\Resources\MahasiswaProyeks\Pages\EditMahasiswaProyek;
use App\Filament\Resources\MahasiswaProyeks\Pages\ListMahasiswaProyeks;
use App\Filament\Resources\MahasiswaProyeks\Schemas\MahasiswaProyekForm;
use App\Filament\Resources\MahasiswaProyeks\Tables\MahasiswaProyeksTable;
use App\Models\MahasiswaProyek;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class MahasiswaProyekResource extends Resource
{
    protected static ?string $model = MahasiswaProyek::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Proyek';
    
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return MahasiswaProyekForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MahasiswaProyeksTable::configure($table);
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
            'index' => ListMahasiswaProyeks::route('/'),
            'create' => CreateMahasiswaProyek::route('/create'),
            'edit' => EditMahasiswaProyek::route('/{record}/edit'),
        ];
    }
}
