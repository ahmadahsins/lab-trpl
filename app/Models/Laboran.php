<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laboran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip_nik',
        'nama',
        'email',
        'jabatan',
        'foto',
        'lab_id',
    ];

    /**
     * Get the lab that this laboran belongs to
     */
    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class);
    }
}
