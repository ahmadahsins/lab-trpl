<?php

namespace App\Filament\Resources\Laborans\Schemas;

use App\Models\Lab;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LaboranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nip')
                    ->label('NIP')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
                
                Select::make('lab_id')
                    ->label('Laboratorium')
                    ->relationship('lab', 'nama_lab')
                    ->options(Lab::pluck('nama_lab', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                
                FileUpload::make('foto')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('laboran-photos')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}
