<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = "buku";
    protected $primaryKey = "buku_id";

    protected $guarded = ['buku_id'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    /**
     * The kategori that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_buku', 'buku_id', 'kategori_id');
    }

    /**
     * Get all of the koleksi for the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function koleksi(): HasMany
    {
        return $this->hasMany(Koleksi::class, 'buku_id', 'buku_id');
    }
}