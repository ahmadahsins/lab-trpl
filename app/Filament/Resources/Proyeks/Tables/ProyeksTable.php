<?php

namespace App\Filament\Resources\Proyeks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProyeksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->size(50),
                
                TextColumn::make('judul')
                    ->label('Judul Proyek')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('dosen.nama')
                    ->label('Dosen Penanggung Jawab')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('lab.nama_lab')
                    ->label('Laboratorium')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Riset Dosen' => 'success',
                        'Publikasi' => 'success',
                        'Proyek Internal' => 'success',
                        'Sistem Informasi' => 'success',
                        'Aplikasi Mobile' => 'success',
                        'Aplikasi Web' => 'success',
                        'Aplikasi Desktop' => 'success',
                        'AI/ML' => 'success',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),
                
                TextColumn::make('mahasiswaProyeks_count')
                    ->label('Jumlah Mahasiswa')
                    ->counts('mahasiswaProyeks')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('kategori')
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
                    ]),
                
                SelectFilter::make('dosen_id')
                    ->label('Dosen')
                    ->relationship('dosen', 'nama'),
                
                SelectFilter::make('lab_id')
                    ->label('Laboratorium')
                    ->relationship('lab', 'nama_lab'),
            ])
            ->actions([
                EditAction::make()
                    ->url(fn ($record): string => route('filament.admin.resources.proyeks.edit', ['record' => $record])),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tahun', 'desc');
    }
}
