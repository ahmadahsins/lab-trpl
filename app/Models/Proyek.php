<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'dosen_id',
        'tahun',
        'kategori',
        'link_web_proyek',
        'link_repo',
    ];

    /**
     * Get the lecturer that owns the project
     */
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }
}
