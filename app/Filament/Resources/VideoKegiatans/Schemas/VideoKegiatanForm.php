<?php

namespace App\Filament\Resources\VideoKegiatans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VideoKegiatanForm
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
                    ->unique('video_kegiatans', 'slug', ignoreRecord: true),
                TextInput::make('video_url')
                    ->label('YouTube URL')
                    ->placeholder('https://www.youtube.com/watch?v=... atau https://youtu.be/...')
                    ->url()
                    ->required(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail Kustom (Opsional)')
                    ->helperText('Jika kosong, akan otomatis menggunakan thumbnail dari YouTube.')
                    ->image()
                    ->disk('public')
                    ->directory('video-kegiatan'),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label('Publikasikan')
                    ->default(true)
                    ->required(),
            ]);
    }
}
