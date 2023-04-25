<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "PRODUTO";
    protected $primaryKey = 'PRODUTO_ID';

    public function ProductImages(){
        return $this->hasMany('App\Models\ProductImage', 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function Category(){
        return $this->belongsTo('App\Models\Category', 'CATEGORIA_ID', 'CATEGORIA_ID');
    }

    public function ProductStock(){
        return $this->hasOne('App\Models\ProductStock', 'PRODUTO_ID', 'PRODUTO_ID');
    }
}
