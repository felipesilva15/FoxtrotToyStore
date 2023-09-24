@extends('layouts.main')

@section('title', "{$product->PRODUTO_NOME} | Foxtrot Toy Store")

@push('scripts')
    <link rel="stylesheet" href="css/product-show.css">
@endpush

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="w-min mb-3">
                @include('components.breadcrumb', $breadcrumbRoutes)
            </div>
            <div class="d-flex">
                <div class="w-50">
                    @include('components.product-images', [
                        'productImages' => $product->OrderedProductImages(),
                    ])
                </div>
                <div class="w-50 ms-4">
                    <h2 class="mb-1">{{ $product->PRODUTO_NOME }}</h2>
                    <p class="text-secondary fs-5">{{ $product->Category->CATEGORIA_NOME }}</p>
                    <p class="text-secondary overflow-hidden" style="min-height: 76px; max-height: 76px">{{ substr($product->Category->CATEGORIA_DESC, 0, 150) }}</p>
                    <div class="mt-5">
                        @if (isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0 && $product->PRODUTO_ATIVO == 1)
                            <span class="fs-5 fw-bold me-1 text-primary">{{ $product->FormattedDiscountPrice() }}</span>
                            @if ($product->PRODUTO_DESCONTO != 0)
                                <span class="text-secondary"><s>{{ $product->FormattedPrice() }}</s></span>
                            @endif
                        @else
                            <span class="fs-5 fw-bold me-1 text-secondary">{{ $product->FormattedDiscountPrice() }}</span>
                        @endif
                    </div>
                    <div>
                        @if (isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0 && $product->PRODUTO_ATIVO == 1)
                            <span class="text-secondary">{{ $product->ProductStock->PRODUTO_QTD }} em estoque</span>
                        @else
                            <span class="opacity-0">A</span>
                        @endif
                    </div>
                    @if(isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0 &&  $product->PRODUTO_ATIVO == 1)
                        <form action="{{ route('cart.store', ['product' => $product->PRODUTO_ID]) }}" method="POST">
                            <div class="d-flex justify-centent-between align-items-center mt-2">
                                @csrf
                                <div class="me-3">
                                    <button type="button" id="remove-qty-item" class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link disabled qty-button" qty-value="-1">chevron_left</button>
                                    <input type="number" class="fw-bold  text-center rounded p-1" name="qtyItem" id="qtyItem" value="1" maxlength="{{ isset($product->ProductStock->PRODUTO_QTD) ? $product->ProductStock->PRODUTO_QTD : 1 }}">
                                    <button type="button" id="add-qty-item" class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link qty-button" qty-value="1">chevron_right</button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary d-flex justify-content-center">
                                        <span class="material-icons md-24 me-1 hand-cursor">shopping_cart</span>
                                        <span class="fw-bold">Comprar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <button class="btn btn-secondary d-flex w-100 justify-content-center disabled">
                            <span class="material-icons md-24 me-1 hand-cursor">cancel</span>
                            <span class="fw-bold">Produto indisponível</span>
                        </button>
                    @endif
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
                'products' => $product->Category->AvaiableProducts(8),
            ])
            <div class="d-flex align-items-end flex-column w-100">
                <a href="{{ route('product', ['categories[]' => $product->Category->CATEGORIA_ID]) }}"
                    class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
                    <div class="fw-bold fs-5 me-1">Ver mais</div>
                    <div class="material-icons mt-1 hand-cursor">double_arrow</div>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="js/product-show.js"></script>
@endpush