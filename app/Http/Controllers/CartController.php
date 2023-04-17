<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        // Buscar os itens do carrinho na tabela CARRINHO_ITEM
        $cartItems = CartItem::where([
            ['USUARIO_ID', auth()->id()],
            ['ITEM_QTD', '<>', 0]
        ])->get();

        $totalizer = [
            'TOTAL_PRODUTO' => 0,
            'TOTAL_DESCONTO' => 0,
            'TOTAL' => 0 
        ];

        foreach ($cartItems as $item){
            $totalizer['TOTAL_PRODUTO'] += ($item->produto->PRODUTO_PRECO) * $item->ITEM_QTD;
            $totalizer['TOTAL_DESCONTO'] += ($item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
            $totalizer['TOTAL'] += ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
        }

        // Retornar a view do carrinho de compras com os itens encontrados
        return view('cart', [
            'cartItems' => $cartItems,
            'totalizer' => $totalizer
        ]);
    }

    public function store(int $product){
        CartItem::create([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $product,
            'ITEM_QTD' => 1
        ]);

        return redirect(route('cart'))->with('message', 'Item adicionado ao carrinho');
    }

    public function destroy($product){
        $cartItem = CartItem::where([
            ['PRODUTO_ID', $product],
            ['USUARIO_ID', Auth::user()->USUARIO_ID]
        ]);

        $cartItem->update([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $product,
            'ITEM_QTD' => 0
        ]);

        return redirect(route('cart'))->with('error', 'Item removido do carrinho');
    }
}
