<?php

namespace App\Filament\Resources\MahasiswaProyeks\Schemas;

use App\Models\Dosen;
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
                
                TextInput::make('judul_skripsi')
                    ->label('Judul Skripsi/Proyek Akhir')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                TextInput::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->numeric()
                    ->required()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 1),
                
                TextInput::make('link_proyek_web')
                    ->label('Link Website Proyek')
                    ->url()
                    ->maxLength(255),
            ]);
    }
}
