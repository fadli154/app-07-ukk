<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;

    protected $table = "users";
    protected $primaryKey = "user_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'user_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get all of the koleksi for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function koleksi(): HasMany
    {
        return $this->hasMany(Koleksi::class, 'user_id', 'user_id');
    }

    /**
     * Get all of the koleksi for the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ulasan(): HasMany
    {
        return $this->hasMany(Ulasan::class, 'user_id', 'user_id');
    }
}