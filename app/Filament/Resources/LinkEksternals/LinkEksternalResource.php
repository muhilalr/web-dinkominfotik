<?php

namespace App\Filament\Resources\LinkEksternals;

use App\Filament\Resources\LinkEksternals\Pages\CreateLinkEksternal;
use App\Filament\Resources\LinkEksternals\Pages\EditLinkEksternal;
use App\Filament\Resources\LinkEksternals\Pages\ListLinkEksternals;
use App\Filament\Resources\LinkEksternals\Schemas\LinkEksternalForm;
use App\Filament\Resources\LinkEksternals\Tables\LinkEksternalsTable;
use App\Models\LinkEksternal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LinkEksternalResource extends Resource
{
    protected static ?string $model = LinkEksternal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return LinkEksternalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinkEksternalsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLinkEksternals::route('/'),
            'create' => CreateLinkEksternal::route('/create'),
            'edit' => EditLinkEksternal::route('/{record}/edit'),
        ];
    }
}
