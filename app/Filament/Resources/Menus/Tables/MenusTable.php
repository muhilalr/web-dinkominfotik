<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('parent.judul')
                    ->label('Parent Menu')
                    ->placeholder('-'),
                TextColumn::make('tipe')
                    ->label('Tipe Navigasi')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'page' => 'Halaman (Page)',
                        'url' => 'URL Eksternal',
                        'route' => 'URL Internal (Statis)',
                        default => $state,
                    })
                    ->badge(),
                TextColumn::make('page.judul')
                    ->label('Halaman Target')
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('URL Eksternal')
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('route_name')
                    ->label('URL Internal (Statis)')
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
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
