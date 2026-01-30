<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'id_produk_api',
        'nama_produk',
        'harga',
        'kategori_id',
        'status_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusModel::class);
    }

}
