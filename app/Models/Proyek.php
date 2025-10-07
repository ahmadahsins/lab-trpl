<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Proyek extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'dosen_id',
        'lab_id',
        'tahun',
        'kategori',
        'link_web_proyek',
        'link_repo',
        'foto',
    ];
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /**
     * Get the lecturer that owns the project
     */
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }
    
    /**
     * Get the lab that this project belongs to
     */
    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class);
    }
    
    /**
     * Get the students involved in this project
     */
    public function mahasiswaProyeks(): BelongsToMany
    {
        return $this->belongsToMany(MahasiswaProyek::class, 'mahasiswa_proyek_proyek');
    }
}
