<?php

namespace App\Filament\Resources\Labs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LabForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lab')
                    ->label('Nama Laboratorium')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                
                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                
                FileUpload::make('foto')
                    ->label('Foto Laboratorium')
                    ->image()
                    ->directory('lab-photos')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}
