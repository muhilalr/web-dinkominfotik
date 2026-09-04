<?php

namespace App\Filament\Resources\GaleriFotos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class GaleriFotosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto.gambar')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('foto_count')
                    ->label('Jumlah Foto')
                    ->counts('foto')
                    ->sortable(),
                TextColumn::make('event_date')
                    ->label('Tanggal Kegiatan')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Publikasi'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
