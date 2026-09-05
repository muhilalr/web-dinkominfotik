<?php

namespace App\Filament\Resources\VideoKegiatans\Pages;

use App\Filament\Resources\VideoKegiatans\VideoKegiatanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVideoKegiatan extends EditRecord
{
    protected static string $resource = VideoKegiatanResource::class;

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
