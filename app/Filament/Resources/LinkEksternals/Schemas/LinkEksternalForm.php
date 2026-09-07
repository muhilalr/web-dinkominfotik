<?php

namespace App\Filament\Resources\LinkEksternals\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LinkEksternalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                FileUpload::make('gambar')
                    ->label('Gambar Logo')
                    ->image()
                    ->disk('public')
                    ->directory('link-eksternals')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(2048),
                TextInput::make('url')
                    ->url()
                    ->required(),
                Select::make('tipe')
                    ->options(['pemerintah' => 'Pemerintah', 'layanan' => 'Layanan'])
                    ->default('pemerintah')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
