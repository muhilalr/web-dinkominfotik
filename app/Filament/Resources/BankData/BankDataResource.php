<?php

namespace App\Filament\Resources\BankData;

use App\Filament\Resources\BankData\Pages\CreateBankData;
use App\Filament\Resources\BankData\Pages\EditBankData;
use App\Filament\Resources\BankData\Pages\ListBankData;
use App\Filament\Resources\BankData\Schemas\BankDataForm;
use App\Filament\Resources\BankData\Tables\BankDataTable;
use App\Models\BankData;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BankDataResource extends Resource
{
    protected static ?string $model = BankData::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return BankDataForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BankDataTable::configure($table);
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
            'index' => ListBankData::route('/'),
            'create' => CreateBankData::route('/create'),
            'edit' => EditBankData::route('/{record}/edit'),
        ];
    }
}
