<?php

namespace App\Filament\Resources\DosenResource\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DosensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(50),

                TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bidangKeahlians.nama_bidang')
                    ->label('Bidang Keahlian')
                    ->badge()
                    ->separator(','),

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
                SelectFilter::make('jabatan')
                    ->label('Jabatan')
                    ->options([
                        'Kaprodi TRPL' => 'Kaprodi TRPL',
                        'Sekretaris TRPL' => 'Sekretaris TRPL',
                        'Dosen TRPL' => 'Dosen TRPL',
                    ]),
            ])
            // ->actions([
            //     ViewAction::make(),
            //     EditAction::make(),
            // ])
            // ->bulkActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ])
            ->defaultSort('nama');
    }
}
