<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['namabarang', 'merk', 'type', 'harga', 'stok', 'description'];
    /**
     * @var mixed
     */
}
