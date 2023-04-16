<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $breadcrumbRoutes = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Produtos', 'url' => url('/product')]
        ];

        $conditions = [
            ['PRODUTO_ATIVO', '1']
        ];

        $sortOption = '';

        if(request('search')){
            array_push($conditions, ['PRODUTO_NOME', 'like', '%'.request('search').'%']);

            array_push($breadcrumbRoutes, ['name' => ucwords(request('search')), 'url' => url('/product?search='.request('search'))]);
        }

        if(request('price')){
            array_push($conditions, ['PRODUTO_PRECO', '<=', request('price')]);
        }

        switch (request('sort')) {
            case 1:
                $sortOption = 'PRODUTO_PRECO - PRODUTO_DESCONTO ASC';
                break;
            
            case 2:
                $sortOption = 'PRODUTO_PRECO - PRODUTO_DESCONTO DESC';
                break;

            case 3:
                $sortOption = 'PRODUTO_NOME ASC';
                break;

            case 4:
                $sortOption = 'PRODUTO_NOME DESC';
                break;

            case 5:
                $sortOption = 'CATEGORIA_NOME';
                break;

            case 7:
                $sortOption = 'PRODUTO_DESCONTO / (PRODUTO_PRECO / 100) DESC';
                break;
            
            default:
                $sortOption = 'PRODUTO_ID';
                break;
        }

        $per_page = request('per_page') ? request('per_page') : 12;

        if(request('categories')){
            $products = Product::where($conditions)->whereIn('CATEGORIA_ID', request('categories'))->orderByRaw($sortOption)->paginate($per_page);
        } else{
            $products = Product::where($conditions)->orderByRaw($sortOption)->paginate($per_page);
        }

        $data = [
            'products' => $products,
            'breadcrumbRoutes' => $breadcrumbRoutes,
            'categories' => Category::where('CATEGORIA_ATIVO', '1')->get()
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
