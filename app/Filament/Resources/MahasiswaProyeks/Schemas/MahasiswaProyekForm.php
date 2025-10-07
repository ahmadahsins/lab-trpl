<?php

namespace App\Filament\Resources\MahasiswaProyeks\Schemas;

use App\Models\Dosen;
use App\Models\Proyek;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MahasiswaProyekForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(255),
                
                Select::make('dosen_pembimbing_id')
                    ->label('Dosen Pembimbing')
                    ->relationship('dosenPembimbing', 'nama')
                    ->options(Dosen::pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                
                FileUpload::make('foto_profil')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('mahasiswa-photos')
                    ->visibility('public'),
                
                Select::make('proyeks')
                    ->label('Proyek yang Diikuti')
                    ->relationship('proyeks', 'judul')
                    ->options(Proyek::pluck('judul', 'id'))
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
            ]);
    }
}
