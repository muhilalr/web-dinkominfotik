<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'bank_data_id',
    'file_name',
    'file_path',
    'file_type',
    'file_size',
    'download_count',
])]
class LampiranBankData extends Model
{
    use HasFactory;

    public function bankData()
    {
        return $this->belongsTo(BankData::class, 'bank_data_id');
    }
}
