<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentar extends Model
{
    use SoftDeletes;
    protected $fillable = ['isi_komentar', 'product_id', 'customer_id'];
}
