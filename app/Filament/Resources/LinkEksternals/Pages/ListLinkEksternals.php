<?php

namespace App\Filament\Resources\LinkEksternals\Pages;

use App\Filament\Resources\LinkEksternals\LinkEksternalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLinkEksternals extends ListRecords
{
    protected static string $resource = LinkEksternalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
