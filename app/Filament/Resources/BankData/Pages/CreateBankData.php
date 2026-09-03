<?php

namespace App\Filament\Resources\BankData\Pages;

use App\Filament\Resources\BankData\BankDataResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBankData extends CreateRecord
{
    protected static string $resource = BankDataResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->record->lampiranBankData->each->fillMetadataFromDisk();
    }
}
