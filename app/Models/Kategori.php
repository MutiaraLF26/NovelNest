<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = ['nama_kategori', 'slug_kategori', 'gambar_kategori'];

    public function novels()
    {
        return $this->hasMany(Novel::class, 'id_kategori');
    }
}
