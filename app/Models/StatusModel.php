<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'nama_status'
    ];

    public function produk()
    {
        return $this->hasMany(ProdukModel::class);
    }

}
