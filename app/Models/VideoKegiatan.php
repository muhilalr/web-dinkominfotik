<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'judul',
    'slug',
    'deskripsi',
    'thumbnail',
    'video_url',
    'is_published',
])]
class VideoKegiatan extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function getYoutubeIdAttribute(): ?string
    {
        $url = $this->video_url;

        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;

        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }

    public function getYoutubeThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return asset('storage/'.$this->thumbnail);
        }

        $id = $this->youtube_id;

        return $id ? "https://img.youtube.com/vi/{$id}/hqdefault.jpg" : asset('img/default-video.jpg');
    }
}
