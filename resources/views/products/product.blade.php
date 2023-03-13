@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Desconto(%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->PRODUTO_ID }}</td>
                    <td>{{ $product->PRODUTO_NOME }}</td>
                    <td>{{ $product->PRODUTO_PRECO }}</td>
                    <td>{{ $product->PRODUTO_DESCONTO }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
