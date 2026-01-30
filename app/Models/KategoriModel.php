<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function produk()
    {
        return $this->hasMany(ProdukModel::class);
    }

}
