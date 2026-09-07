<?php

namespace App\Filament\Resources\LinkEksternals\Pages;

use App\Filament\Resources\LinkEksternals\LinkEksternalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLinkEksternal extends CreateRecord
{
    protected static string $resource = LinkEksternalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
