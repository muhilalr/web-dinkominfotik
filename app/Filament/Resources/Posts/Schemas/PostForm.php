<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship(name: 'kategori', titleAttribute: 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('tipe')
                    ->options(['berita' => 'Berita', 'artikel' => 'Artikel'])
                    ->default('berita')
                    ->live()
                    ->required(),
                TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique('posts', 'slug', ignoreRecord: true),
                RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory(function ($get) {
                        $tipe = $get('tipe') ?? 'berita';

                        if ($tipe === 'berita') {
                            return 'posts/berita';
                        } elseif ($tipe === 'artikel') {
                            return 'posts/artikel';
                        }

                        return 'posts';
                    })
                    ->columnSpanFull()
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(1024),
                Toggle::make('is_headline')
                    ->label('Tampilkan di Headline')
                    ->required(),
                Toggle::make('is_published')
                    ->label('Publikasikan')
                    ->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
