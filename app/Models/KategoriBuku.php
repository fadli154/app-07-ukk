<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = "kategori_buku";
    protected $primaryKey = "kategori_buku_id";

    protected $guarded = ['kategori_buku_id'];
}
