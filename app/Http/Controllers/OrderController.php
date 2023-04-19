<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        return view('order.order', ['orders' => Auth::user()->Orders]);
    }

    public function show(Order $order){
        return view('order.show', ['order' => $order]);
    }

    public function store(){
        $user = Auth::user();

        // Cria o pedido
        $order = Order::create([
            'USUARIO_ID' => $user->USUARIO_ID,
            'STATUS_ID' => 1,
            'PEDIDO_DATA' => now()
        ]);

        // Cria os itens do pedido e os retira do carrinho
        foreach ($user->CartItems as $item) {
            OrderItem::create([
                'PEDIDO_ID' => $order->PEDIDO_ID,
                'PRODUTO_ID' => $item->PRODUTO_ID,
                'ITEM_QTD' => $item->ITEM_QTD,
                'ITEM_PRECO' => ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO)
            ]);

            $item->update([
                'ITEM_QTD' => 0
            ]);
        }

        return redirect(route('order.show', ['order' => $order->PEDIDO_ID]))->with('message', 'Pedido registrado!');
    }
}