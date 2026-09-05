<?php

namespace App\Filament\Resources\VideoKegiatans;

use App\Filament\Resources\VideoKegiatans\Pages\CreateVideoKegiatan;
use App\Filament\Resources\VideoKegiatans\Pages\EditVideoKegiatan;
use App\Filament\Resources\VideoKegiatans\Pages\ListVideoKegiatans;
use App\Filament\Resources\VideoKegiatans\Schemas\VideoKegiatanForm;
use App\Filament\Resources\VideoKegiatans\Tables\VideoKegiatansTable;
use App\Models\VideoKegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VideoKegiatanResource extends Resource
{
    protected static ?string $model = VideoKegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return VideoKegiatanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VideoKegiatansTable::configure($table);
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
            'index' => ListVideoKegiatans::route('/'),
            'create' => CreateVideoKegiatan::route('/create'),
            'edit' => EditVideoKegiatan::route('/{record}/edit'),
        ];
    }
}
