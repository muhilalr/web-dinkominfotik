<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['site_setting_id', 'gambar', 'urutan', 'is_active'])]
class HeroSlider extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'urutan' => 'integer',
        ];
    }

    public function siteSetting(): BelongsTo
    {
        return $this->belongsTo(SiteSetting::class);
    }
}
