<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $productsAuxCode = DB::select('SELECT ITE.PRODUTO_ID FROM PEDIDO_ITEM ITE GROUP BY ITE.PRODUTO_ID ORDER BY SUM(COALESCE(ITE.ITEM_QTD, 0)) DESC');

        if(count($productsAuxCode) != 0){
            $productsBestSellings = Product::where('PRODUTO_ATIVO', '1')->whereIn('PRODUTO_ID', $productsAuxCode)->take(12)->get();
        } else{
            $productsBestSellings = Product::where('PRODUTO_ATIVO', '1')->take(12)->get();
        }

        $productsBestDiscounts = Product::where('PRODUTO_ATIVO', '1')->orderByRaw('PRODUTO_DESCONTO / (PRODUTO_PRECO / 100) DESC')->take(12)->get();

        return view('home', [
            'productsBestDiscounts' => $productsBestDiscounts,
            'productsBestSellings' => $productsBestSellings
        ]);
    }
}


