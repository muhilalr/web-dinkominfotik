<?php

namespace App\Filament\Resources\Settings\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HeroSlidersRelationManager extends RelationManager
{
    protected static string $relationship = 'heroSliders';

    protected static ?string $title = 'Hero Sliders';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Gambar Slider')
                    ->image()
                    ->disk('public')
                    ->directory('hero-sliders')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('urutan')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('gambar')
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->height(60),
                TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->defaultSort('urutan')
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
