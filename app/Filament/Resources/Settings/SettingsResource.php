<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\Pages\EditSettings;
use App\Filament\Resources\Settings\RelationManagers\HeroSlidersRelationManager;
use App\Filament\Resources\Settings\Schemas\SettingsForm;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class SettingsResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Pengaturan Website';

    protected static ?string $modelLabel = 'Pengaturan Website';

    protected static ?string $pluralModelLabel = 'Pengaturan Website';

    public static function form(Schema $schema): Schema
    {
        return SettingsForm::configure($schema);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            HeroSlidersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditSettings::route('/'),
        ];
    }
}
