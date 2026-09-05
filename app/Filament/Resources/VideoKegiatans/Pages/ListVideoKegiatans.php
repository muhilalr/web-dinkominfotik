<?php

namespace App\Filament\Resources\VideoKegiatans\Pages;

use App\Filament\Resources\VideoKegiatans\VideoKegiatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVideoKegiatans extends ListRecords
{
    protected static string $resource = VideoKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
