<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentar extends Model
{
    use SoftDeletes;
    //protected $fillable = ['']

    public function product(){
        return $this->hasMany(Product::class);
    }
}
