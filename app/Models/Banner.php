<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('gambar', 'link_url', 'sort_order', 'is_active', 'start_at', 'end_at')]
class Banner extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'start_at' => 'date',
            'end_at' => 'date',
        ];
    }
}
