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
        if($order->User->USUARIO_ID != Auth::user()->USUARIO_ID){
            return abort(404);
        }

        return view('order.show', ['order' => $order]);
    }

    public function store(){
        $user = Auth::user();

        if(!Auth::user()->CartItems->sum('ITEM_QTD')){
            return back()->with('error', 'Insira ao menos um item no carrinho para finalizar o pedido!');
        }

        // Cria o pedido
        $order = Order::create([
            'USUARIO_ID' => $user->USUARIO_ID,
            'STATUS_ID' => 1,
            'PEDIDO_DATA' => now()
        ]);

        // Cria os itens do pedido e os retira do carrinho
        foreach ($user->CartItems as $item) {
            if(!$item->ITEM_QTD){
                continue;
            }

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