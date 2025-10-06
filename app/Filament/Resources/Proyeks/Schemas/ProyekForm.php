<?php

namespace App\Filament\Resources\Proyeks\Schemas;

use App\Models\Dosen;
use App\Models\Lab;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProyekForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Proyek')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Select::make('dosen_id')
                    ->label('Dosen Penanggung Jawab')
                    ->relationship('dosen', 'nama')
                    ->options(Dosen::pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('lab_id')
                    ->label('Laboratorium')
                    ->relationship('lab', 'nama_lab')
                    ->options(Lab::pluck('nama_lab', 'id'))
                    ->searchable()
                    ->preload(),
                
                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Riset Dosen' => 'Riset Dosen',
                        'Publikasi' => 'Publikasi',
                        'Proyek Internal' => 'Proyek Internal',
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Aplikasi Mobile' => 'Aplikasi Mobile',
                        'Aplikasi Web' => 'Aplikasi Web',
                        'Aplikasi Desktop' => 'Aplikasi Desktop',
                        'AI/ML' => 'AI/ML',
                    ])
                    ->required(),
                
                TextInput::make('tahun')
                    ->label('Tahun')
                    ->numeric()
                    ->required()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 1),
                
                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                
                TextInput::make('link_web_proyek')
                    ->label('Link Website Proyek')
                    ->url()
                    ->maxLength(255),
                
                TextInput::make('link_repo')
                    ->label('Link Repository')
                    ->url()
                    ->maxLength(255),
            ]);
    }
}
