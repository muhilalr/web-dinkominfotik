<?php

namespace App\Filament\Resources\VideoKegiatans\Pages;

use App\Filament\Resources\VideoKegiatans\VideoKegiatanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVideoKegiatan extends CreateRecord
{
    protected static string $resource = VideoKegiatanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
