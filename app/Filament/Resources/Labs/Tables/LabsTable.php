<?php

namespace App\Filament\Resources\Labs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LabsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lab')
                    ->label('Nama Laboratorium')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable(),
                
                TextColumn::make('laborans_count')
                    ->label('Jumlah Laboran')
                    ->counts('laborans')
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
                //
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
            ->defaultSort('nama_lab');
    }
}
