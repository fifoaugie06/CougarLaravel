<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['gambar', 'namabarang', 'merk', 'type', 'harga', 'stok', 'description'];
    /**
     * @var mixed
     */
    public function comentar(){
        return $this->belongsTo(Comentar::class);
    }
}
