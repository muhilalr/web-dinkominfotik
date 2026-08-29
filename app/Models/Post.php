<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('id_kategori', 'author_id', 'tipe', 'judul', 'slug', 'konten', 'thumbnail', 'views', 'is_headline', 'is_published', 'published_at')]
class Post extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_headline' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
