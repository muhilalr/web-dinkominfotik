<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function galeriFotos()
    {
        return $this->hasMany(GaleriFoto::class, 'created_by');
    }

    public function videoKegiatans()
    {
        return $this->hasMany(VideoKegiatan::class, 'created_by');
    }

    public function bankData()
    {
        return $this->hasMany(BankData::class, 'created_by');
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'created_by');
    }
}
