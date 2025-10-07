<?php

namespace App\Filament\Resources\MahasiswaProyeks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MahasiswaProyeksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_profil')
                    ->label('Foto')
                    ->circular()
                    ->size(50),
                
                TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('dosenPembimbing.nama')
                    ->label('Dosen Pembimbing')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('proyeks_count')
                    ->label('Jumlah Proyek')
                    ->counts('proyeks')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('dosen_pembimbing_id')
                    ->label('Dosen Pembimbing')
                    ->relationship('dosenPembimbing', 'nama'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama_mahasiswa');
    }
}
