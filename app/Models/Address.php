<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "ENDERECO";
    protected $primaryKey = "ENDERECO_ID";

    public function AddressUser(){
        return $this->hasOne('App\Models\User', 'USUARIO_ENDERECO', 'USUARIO_ENDERECO');
    }
}
