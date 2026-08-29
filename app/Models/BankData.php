<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'slug', 'deskripsi', 'is_published', 'created_by'])]
class BankData extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lampiranBankData()
    {
        return $this->hasMany(LampiranBankData::class, 'bank_data_id');
    }
}
