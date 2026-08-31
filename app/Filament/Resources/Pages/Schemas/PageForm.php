<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->unique('pages', 'slug', ignoreRecord: true),

                RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Publikasikan')
                    ->default(true)
                    ->required(),
            ]);
    }
}
