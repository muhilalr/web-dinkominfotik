<?php

namespace App\Filament\Resources\GaleriFotos\Pages;

use App\Filament\Resources\GaleriFotos\GaleriFotoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGaleriFoto extends CreateRecord
{
    protected static string $resource = GaleriFotoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
