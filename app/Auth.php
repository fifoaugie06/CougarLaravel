<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    //
    protected $table = 'Customers';
    protected $fillable = ['nama', 'alamat', 'kota', 'email', 'password'];
}
