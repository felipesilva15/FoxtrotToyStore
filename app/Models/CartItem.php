<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'CARRINHO_ITEM'; // nome da tabela no banco de dados
    protected $fillable = ['USUARIO_ID', 'PRODUTO_ID', 'ITEM_QTD'];
    public $timestamps = false;

    // Relacionamento com a tabela de produtos
    public function produto()
    {
        return $this->belongsTo('App\Models\Product', 'PRODUTO_ID', 'PRODUTO_ID');
    }

    // Relacionamento com a tabela de usuários
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
