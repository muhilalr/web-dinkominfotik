<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Gambar Banner')
                    ->image()
                    ->disk('public')
                    ->directory('banners')
                    ->columnSpanFull()
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(2048)
                    ->required(),
                TextInput::make('link_url')
                    ->label('URL Link (Opsional)')
                    ->url()
                    ->placeholder('https://contoh.com'),
                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                DatePicker::make('start_at')
                    ->label('Tampilkan Mulai'),
                DatePicker::make('end_at')
                    ->label('Tampilkan Sampai'),
            ]);
    }
}
