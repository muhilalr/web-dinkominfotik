<?php

namespace App\Filament\Resources\Pengumumen\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PengumumanForm
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
                    ->unique('pengumuman', 'slug', ignoreRecord: true),
                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('pengumuman')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(2048),
                RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at'),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
