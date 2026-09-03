<?php

namespace App\Filament\Resources\BankData\Pages;

use App\Filament\Resources\BankData\BankDataResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBankData extends EditRecord
{
    protected static string $resource = BankDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        $this->record->load('lampiranBankData');
        $this->record->lampiranBankData->each->fillMetadataFromDisk();
    }
}
