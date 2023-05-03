@extends('layouts.main')

@section('title', "{$product->PRODUTO_NOME} | Foxtrot Toy Store")

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="w-min mb-3">
                @include('components.breadcrumb', $breadcrumbRoutes)
            </div>
            <div class="d-flex">
                <div class="w-50">
                    @include('components.product-images', ['productImages' => $product->OrderedProductImages()])
                </div>
                <div class="w-50 ms-4">
                    <h2 class="mb-1">{{ $product->PRODUTO_NOME }}</h2>
                    <p class="text-secondary fs-5">{{ $product->Category->CATEGORIA_NOME }}</p>
                    <p class="text-secondary overflow-hidden" style="min-height: 85px; max-height: 85px">{{ $product->Category->CATEGORIA_DESC }}</p>
                    <div class="mt-5">
                        @if (isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0)
                            <span class="fs-5 fw-bold me-1 text-primary">R$
                                {{ number_format($product->PRODUTO_PRECO - $product->PRODUTO_DESCONTO, 2, ',', '') }}</span>
                            @if ($product->PRODUTO_DESCONTO != 0)
                                <span class="text-secondary"><s>R$
                                        {{ number_format($product->PRODUTO_PRECO ?? 0, 2, ',', '') }}</s></span>
                            @endif
                        @else
                            <span class="fs-5 fw-bold me-1 text-secondary">R$ --,--</span>
                        @endif
                    </div>
                    <div>
                        @if (isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0)
                            <span class="text-secondary">{{ $product->ProductStock->PRODUTO_QTD }} em estoque</span>
                        @else
                            <span class="text-secondary">Produto indisponível</span>
                        @endif
                    </div>
                    <div class="d-flex justify-centent-between align-items-center mt-2">
                        <div class="me-3">
                            <form class="d-flex justify-content-center align-items-center form-qty" method="post"
                                action="{{ route('cart.store', ['product' => $product->PRODUTO_ID]) }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link remove-qty-item disabled">chevron_left</button>
                                <span class="fw-bold mx-2">1</span>
                                <button type="submit"
                                    class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link add-qty-item">chevron_right</button>
                                <input type="hidden" name="qtyItem" value="1">
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('cart.store', ['product' => $product->PRODUTO_ID]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-primary d-flex justify-content-center">
                                    <span class="material-icons md-24 me-1 hand-cursor">shopping_cart</span>
                                    <span class="fw-bold">Comprar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <span class="nav-link active fw-bold" aria-current="page">Descrição do produto</span>
                </li>
            </ul>
            <div class="border border-top-0 rounded-bottom-1 p-3" style="min-height: 300px;">
                <p class="m-0">{{ $product->PRODUTO_DESC }}</p>
            </div>
        </div>
        <div class="container">
            <h2 class="mb-2">Produtos semelhantes</h2>
            @include('components.product-carrousel', [
                'products' => $product->Category->AvaiableProducts(12),
            ])
        </div>
    </section>
@endsection
