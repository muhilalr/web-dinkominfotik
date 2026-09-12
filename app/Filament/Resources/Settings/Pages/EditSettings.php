<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingsResource;
use App\Models\SiteSetting;
use Filament\Resources\Pages\EditRecord;

class EditSettings extends EditRecord
{
    protected static string $resource = SettingsResource::class;

    public function mount(int|string|null $record = null): void
    {
        $setting = SiteSetting::firstOrCreate([]);

        parent::mount($setting->id);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
