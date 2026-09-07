<?php

namespace App\Filament\Resources\LinkEksternals\Pages;

use App\Filament\Resources\LinkEksternals\LinkEksternalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLinkEksternal extends EditRecord
{
    protected static string $resource = LinkEksternalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
