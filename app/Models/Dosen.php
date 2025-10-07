<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'jabatan',
        'foto',
        'deskripsi_singkat',
        'link_pribadi_web',
        'slug',
    ];

    /**
     * Get all projects associated with the lecturer
     */
    public function proyeks(): HasMany
    {
        return $this->hasMany(Proyek::class);
    }

    /**
     * Get all student projects supervised by the lecturer
     */
    public function mahasiswaProyeks(): HasMany
    {
        return $this->hasMany(MahasiswaProyek::class, 'dosen_pembimbing_id');
    }

    /**
     * Get all expertise fields associated with the lecturer
     */
    public function bidangKeahlians(): BelongsToMany
    {
        return $this->belongsToMany(BidangKeahlian::class, 'dosen_bidang_keahlians');
    }
}
