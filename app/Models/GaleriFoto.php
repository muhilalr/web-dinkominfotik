<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('judul', 'slug', 'event_date', 'is_published')]
class GaleriFoto extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function foto()
    {
        return $this->hasMany(FotoKegiatan::class, 'id_galeri');
    }
}
