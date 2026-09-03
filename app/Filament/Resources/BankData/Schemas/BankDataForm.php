<?php

namespace App\Filament\Resources\BankData\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BankDataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('tahun'),
                Toggle::make('is_published')
                    ->default(true)
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Repeater::make('lampiranBankData')
                    ->label('Lampiran File')
                    ->relationship('lampiranBankData')
                    ->schema([
                        FileUpload::make('file_path')
                            ->label('File Lampiran')
                            ->disk('public')
                            ->directory('bank-data')
                            ->required()
                            ->columnSpanFull()
                            ->storeFileNamesIn('file_name'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
