<?php

namespace App\Filament\Resources\GaleriFotos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class GaleriFotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique('galeri_fotos', 'slug', ignoreRecord: true),
                DatePicker::make('event_date')
                    ->label('Tanggal Kegiatan'),
                Toggle::make('is_published')
                    ->label('Publikasikan')
                    ->default(true)
                    ->required(),
                Repeater::make('foto')
                    ->relationship('foto')
                    ->schema([
                        FileUpload::make('gambar')
                            ->image()
                            ->disk('public')
                            ->directory('galeri-foto')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->grid(2)
                    ->defaultItems(1)
                    ->addActionLabel('Tambah Foto'),
            ]);
    }
}
