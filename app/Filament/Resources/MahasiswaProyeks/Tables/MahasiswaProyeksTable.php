<?php

namespace App\Filament\Resources\MahasiswaProyeks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MahasiswaProyeksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('judul_skripsi')
                    ->label('Judul Skripsi/Proyek Akhir')
                    ->searchable()
                    ->limit(50),
                
                TextColumn::make('dosenPembimbing.nama')
                    ->label('Dosen Pembimbing')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->sortable(),
                
                TextColumn::make('link_proyek_web')
                    ->label('Link Proyek')
                    ->url(fn (string $state): string => $state)
                    ->openUrlInNewTab()
                    ->toggleable(),
                
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
                
                SelectFilter::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->options(function() {
                        $years = range(date('Y'), 2000);
                        return array_combine($years, $years);
                    }),
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
            ->defaultSort('tahun_lulus', 'desc');
    }
}
