<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Relasi ke Products (jika nanti products menggunakan category_id)
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori', 'nama');
    }
}
