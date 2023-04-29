<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $productsBestSellings = Product::where('PRODUTO_ATIVO', '1')->withSum('OrderItems', 'item_qtd')->orderByDesc('order_items_sum_item_qtd')->take(8)->get();
        $productsBestDiscounts = Product::where('PRODUTO_ATIVO', '1')->orderByRaw('PRODUTO_DESCONTO / (PRODUTO_PRECO / 100) DESC')->take(8)->get();

        return view('home', [
            'productsBestDiscounts' => $productsBestDiscounts,
            'productsBestSellings' => $productsBestSellings
        ]);
    }
}


