<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Lab extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'nama_lab',
        'slug',
        'deskripsi',
        'lokasi',
        'foto',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_lab')
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
     * Get all laborans associated with this lab
     */
    public function laborans(): HasMany
    {
        return $this->hasMany(Laboran::class);
    }

    /**
     * Get all projects associated with this lab
     */
    public function proyeks(): HasMany
    {
        return $this->hasMany(Proyek::class);
    }
}
