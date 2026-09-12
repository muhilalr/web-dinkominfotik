<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['logo', 'email', 'telepon', 'alamat'])]
class SiteSetting extends Model
{
    use HasFactory;

    public function heroSliders(): HasMany
    {
        return $this->hasMany(HeroSlider::class)->orderBy('urutan');
    }
}
