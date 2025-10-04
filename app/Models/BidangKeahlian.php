<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BidangKeahlian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bidang',
    ];

    /**
     * Get all lecturers associated with this expertise field
     */
    public function dosens(): BelongsToMany
    {
        return $this->belongsToMany(Dosen::class, 'dosen_bidang_keahlians');
    }
}
