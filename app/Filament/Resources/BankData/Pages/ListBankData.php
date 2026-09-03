<?php

namespace App\Filament\Resources\BankData\Pages;

use App\Filament\Resources\BankData\BankDataResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBankData extends ListRecords
{
    protected static string $resource = BankDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
