<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class MahasiswaProyek extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'slug',
        'dosen_pembimbing_id',
        'foto_profil',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['nama_mahasiswa', 'nim'])
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the lecturer that supervises this student project
     */
    public function dosenPembimbing(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_id');
    }
    
    /**
     * Get the projects that this student is involved in
     */
    public function proyeks(): BelongsToMany
    {
        return $this->belongsToMany(Proyek::class, 'mahasiswa_proyek_proyek');
    }
}
