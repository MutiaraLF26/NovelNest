<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'kategoris';

    protected $fillable = ['nama_kategori', 'slug_kategori', 'gambar_kategori'];

    public function novels()
    {
        return $this->hasMany(Novel::class, 'id_kategori');
    }

    public function sluggable(): array
    {
        return [
            'slug_kategori' => [
                'source' => 'nama_kategori',
            ],
        ];
    }

    public function deleteWithNovels()
    {
        return DB::transaction(function () {
            // Hapus semua novel yang terkait dengan kategori ini
            $this->novels()->delete();

            // Hapus kategori itu sendiri
            $this->delete();

            return true;
        });
    }
}
