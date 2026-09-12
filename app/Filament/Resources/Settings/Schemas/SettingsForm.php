<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('settings')
                    ->columnSpanFull()
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(2048),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),
                TextInput::make('telepon')
                    ->label('Telepon')
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
