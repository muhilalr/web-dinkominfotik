<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_galeri', 'gambar'])]
class FotoKegiatan extends Model
{
    use HasFactory;

    public function galeri()
    {
        return $this->belongsTo(GaleriFoto::class, 'id_galeri');
    }
}
