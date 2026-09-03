<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'bank_data_id',
    'file_name',
    'file_path',
    'file_type',
    'file_size',
])]
class LampiranBankData extends Model
{
    use HasFactory;

    public function bankData()
    {
        return $this->belongsTo(BankData::class, 'bank_data_id');
    }

    public function fillMetadataFromDisk(): void
    {
        if (! $this->file_path) {
            return;
        }

        $absPath = Storage::disk('public')->path($this->file_path);
        if (! file_exists($absPath)) {
            return;
        }

        $this->forceFill([
            'file_type' => $this->file_type ?? mime_content_type($absPath),
            'file_size' => $this->file_size ?? filesize($absPath),
        ])->saveQuietly();
    }

    public static function resolveMissingMetadata(): void
    {
        static::query()
            ->whereNull('file_type')
            ->orWhereNull('file_size')
            ->each(fn (self $lampiran) => $lampiran->fillMetadataFromDisk());
    }
}
