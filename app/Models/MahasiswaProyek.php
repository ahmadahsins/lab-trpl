<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MahasiswaProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'dosen_pembimbing_id',
        'judul_skripsi',
        'tahun_lulus',
        'link_proyek_web',
    ];

    /**
     * Get the lecturer that supervises this student project
     */
    public function dosenPembimbing(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_id');
    }
}
