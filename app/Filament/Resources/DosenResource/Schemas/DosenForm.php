<?php

namespace App\Filament\Resources\DosenResource\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DosenForm
{
    public static function configure(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('nip_nidn')
                    ->label('NIP/NIDN')
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

                TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('foto')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('dosen-photos')
                    ->visibility('public'),

                Textarea::make('deskripsi_singkat')
                    ->label('Deskripsi Singkat')
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('link_pribadi_web')
                    ->label('Link Website Pribadi')
                    ->url()
                    ->maxLength(255),

                Select::make('bidang_keahlians')
                    ->label('Bidang Keahlian')
                    ->multiple()
                    ->relationship('bidangKeahlians', 'nama_bidang')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull(),
            ]);
    }
}
