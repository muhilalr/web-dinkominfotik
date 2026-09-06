<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'slug', 'gambar', 'konten', 'published_at', 'is_published'])]
class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_published' => 'boolean',
        ];
    }
}
