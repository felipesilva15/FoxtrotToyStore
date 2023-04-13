<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $breadcrumbRoutes = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Produtos', 'url' => url('/product')]
        ];

        $data = [
            'products'=>Product::all(),
            'breadcrumbRoutes'=>$breadcrumbRoutes
        ];

        

        return view('products.product', $data);
    }

    public function indexApi(){
        $products = Product::select('PRODUTO_NOME')->get();
        $data = [];

        foreach ($products as $product) {
            array_push($data, $product['PRODUTO_NOME']);
        }

        return response()->json($data, 200);
    }
}
