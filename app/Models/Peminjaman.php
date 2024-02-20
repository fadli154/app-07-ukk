<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = "peminjaman";
    protected $primaryKey = "peminjaman_id";

    protected $guarded = ['peminjaman_id'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['user.name', 'buku.judul']
            ]
        ];
    }

    /**
     * Get the user that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the buku that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'buku_id');
    }

    /**
     * Get the createBy that owns the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    /**
     * Get the updateBy that owns the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }
}
