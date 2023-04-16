<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;


class CartController extends Controller
{
    public function index()
{
    // Buscar os itens do carrinho na tabela CARRINHO_ITEM
    $cartItems = CartItem::where('USUARIO_ID', auth()->id())->get();

    // Retornar a view do carrinho de compras com os itens encontrados
    return view('cart', compact('cartItems'));
}

}
