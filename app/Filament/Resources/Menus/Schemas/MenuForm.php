<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
use App\Models\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),

                Select::make('tipe')
                    ->options([
                        'page' => 'Halaman (Page)',
                        'url' => 'URL Eksternal',
                        'route' => 'URL Internal (Statis)',
                    ])
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state !== 'page') {
                            $set('id_page', null);
                        }
                        if ($state !== 'url') {
                            $set('url', null);
                        }
                        if ($state !== 'route') {
                            $set('route_name', null);
                        }
                    }),

                Select::make('id_page')
                    ->label('Halaman')
                    ->options(Page::pluck('judul', 'id'))
                    ->searchable()
                    ->required(fn ($get) => $get('tipe') === 'page')
                    ->visible(fn ($get) => $get('tipe') === 'page'),

                TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->required(fn ($get) => $get('tipe') === 'url')
                    ->visible(fn ($get) => $get('tipe') === 'url'),

                TextInput::make('route_name')
                    ->label('Nama Route')
                    ->required(fn ($get) => $get('tipe') === 'route')
                    ->visible(fn ($get) => $get('tipe') === 'route'),

                Select::make('parent_id')
                    ->label('Parent Menu')
                    ->options(fn ($record) => Menu::query()
                        ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                        ->pluck('judul', 'id'))
                    ->searchable()
                    ->nullable(),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}
