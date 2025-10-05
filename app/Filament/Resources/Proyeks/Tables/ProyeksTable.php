<?php

namespace App\Filament\Resources\Proyeks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProyeksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Proyek')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('dosen.nama')
                    ->label('Dosen Penanggung Jawab')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Riset Dosen' => 'success',
                        'Publikasi' => 'info',
                        'Proyek Internal' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('tahun')
                    ->label('Tahun')
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
                    ]),
                
                SelectFilter::make('dosen_id')
                    ->label('Dosen')
                    ->relationship('dosen', 'nama'),
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
            ->defaultSort('tahun', 'desc');
    }
}
