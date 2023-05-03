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

    public function OrderItems(){
        return $this->hasMany('App\Models\OrderItem', 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function OrderedProductImages(){
        return $this->ProductImages->sortBy('IMAGEM_ORDEM')->values()->all();
    }

    public function DefaultProductImage(){
        return asset('images/produto-sem-foto.jpg');
    }

    public static function PerPageOptions(){
        return [24, 32, 48];
    }

    public static function SortOptions(){
        return [
            1 => 'Menor preço',
            2 => 'Maior preço',
            3 => 'Nome de A-Z',
            4 => 'Nome de Z-A',
            5 => 'Categoria',
            6 => 'Mais vendidos',
            7 => 'Melhores descontos'
        ];
    }
}
