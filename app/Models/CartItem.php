<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'CARRINHO_ITEM'; // nome da tabela no banco de dados

    // Relacionamento com a tabela de produtos
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    // Relacionamento com a tabela de usuários
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
