@extends('layouts.main')

@section('title', 'Carrinho de compras')

@section('content')
    <section class="my-5">
        <div class="m-auto text-center mb-5">
            <h2>Carrinho de Compras</h2>
        </div>
        <div class="container shadow rounded p-4">
            @if (!$cartItems->isEmpty())
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-4">
                        <span class="material-icons ms-1 me-2 md-24 text-primary">shopping_basket</span>
                        <span class="fw-bold fs-4">Produtos</span>
                    </div>
                    @foreach ($cartItems as $item)
                        <div class="w-100 d-flex">
                            <a href="{{ route('product.show', ['product' => $item->produto->PRODUTO_ID]) }}"
                                style="width: 140px">
                                <img class="w-100 image-fit"
                                    src="{{ isset($item->produto->OrderedProductImages()[0]->IMAGEM_URL) ? $item->produto->OrderedProductImages()[0]->IMAGEM_URL : $item->produto->DefaultProductImage() }}"
                                    class="card-img-top" alt="">
                            </a>
                            <div class="d-flex flex-column flex-fill px-3">
                                <a href="{{ route('product.show', ['product' => $item->produto->PRODUTO_ID]) }}" class="text-reset text-decoration-none fw-bold fs-5">{{ $item->produto->PRODUTO_NOME }}</a>
                                <span class="text-secondary-emphasis">{{ $item->produto->category->CATEGORIA_NOME }}</span>
                                <div>
                                    <span class="fw-bold text-primary">{{ $item->produto->FormattedDiscountPrice() }}</span>
                                    @if ($item->produto->PRODUTO_DESCONTO != 0)
                                        <span class="text-secondary fs-7"><s>{{ $item->produto->FormattedPrice() }}</s></span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-3 align-items-center">
                                <span>Qtd.</span>
                                <form class="d-flex justify-content-center align-items-center mb-3 form-qty" method="post"
                                    action="{{ route('cart.store', ['product' => $item->produto->PRODUTO_ID]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link remove-qty-item {{ $item->ITEM_QTD == 1 ? 'disabled' : '' }}">chevron_left</button>
                                    <span class="fw-bold mx-2">{{ $item->ITEM_QTD }}</span>
                                    <button type="submit"
                                        class="btn btn-link text-reset text-decoration-none p-0 material-icons hand-cursor custom-hover-link add-qty-item">chevron_right</button>
                                    <input type="hidden" name="qtyItem" value="{{ $item->ITEM_QTD }}">
                                </form>
                                <div>
                                    <form action="{{ route('cart.store', ['product' => $item->PRODUTO_ID]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger material-icons md-24">delete</button>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex flex-column text-end" style="width: 140px">
                                <span class="fw-bold fs-5">Total</span>
                                <span class="fs-5 fw-bold text-primary">{{ $item->FormattedItemTotal() }}</span>
                            </div>
                        </div>
                        @foreach ($validator->cartItems as $error)
                            @if ($error->product_id == $item->PRODUTO_ID)
                                <div class="mt-3">
                                    @include('components.error-message', ['icon' => $error->icon, 'description' => $error->description])
                                </div>
                            @endif
                        @endforeach
                        @if ($loop->index < count($cartItems) - 1)
                            <hr>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="d-flex flex-column justify-content-center align-items-center m-4">
                    <div class="d-flex flex-column justify-content-center align-items-center text-primary">
                        <span class="material-icons md-72">production_quantity_limits</span>
                        <p class="m-0 fs-5 fw-bold">Seu carrinho está vazio</p>
                    </div>
                    <div class="text-secondary text-center mt-2">
                        <p class="m-0">Não encontramos nenhum item no seu carrinho ainda.</p>
                        <p class="m-0">Veja alguns produtos disponíveis clicando no botão abaixo.</p>
                    </div>
                    <a href="{{ route('product') }}" class="mt-4 btn btn-primary d-flex justify-content-center">
                        <span class="material-icons md-24 me-2 hand-cursor">shopping_basket</span>
                        <span class="fw-bold">Produtos</span>
                    </a>
                </div>
            @endif
        </div>
        @if (!$cartItems->isEmpty())
            <div class="mt-5 shadow rounded p-4 container">
                <div class="d-flex align-items-center mb-4">
                    <span class="material-icons mt-1 me-2 md-24 text-primary">list_alt</span>
                    <span class="fw-bold fs-4">Resumo do pedido</span>
                </div>
                <div>
                    <div class="row">
                        <div class="d-flex flex-column col-2">
                            <span>Total dos produtos:</span>
                            <span>Total de descontos:</span>
                            <span>Frete:</span>
                        </div>
                        <div class="d-flex  flex-column fw-bold col-2">
                            <span>R$ {{ number_format($totalizer['TOTAL_PRODUTO'], 2, ',', '') }}</span>
                            <span>R$ {{ number_format($totalizer['TOTAL_DESCONTO'], 2, ',', '') }}</span>
                            <span>Grátis</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row fw-bold fs-5">
                        <span class="col-2">Total do pedido</span>
                        <span class="col-2 text-primary">R$ {{ number_format($totalizer['TOTAL'], 2, ',', '') }}</span>
                    </div>
                    <div class="mt-3 mb-1">
                        @if (isset($validator->user->address))
                            @include('components.error-message', ['icon' => $validator->user->address->icon, 'description' => $validator->user->address->description])
                        @else
                            <hr>
                            <div class="d-flex align-items-center mb-2">
                                <span class="material-icons mt-1 me-2 md-24 text-primary">home</span>
                                <span class="fw-bold fs-4">Endereço de entrega</span>
                            </div>
                            <div>
                                {{-- {{ Auth::user()->activeAddress()->FormattedAddress() }} --}}
                                Rua dos canárinhos, 158 - Casa, São Paulo, SP
                            </div>
                        @endif
                    </div>
                    <div class="d-flex align-items-stretch mt-3 flex-wrap">
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary me-2 {{ $validator->hasError ? 'disabled btn-secondary' : '' }}">Finalizar compra</button>
                        </form>
                        <a href="{{ route('product') }}" class="btn btn-outline-primary">Continuar comprando</a>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="js/cart.js"></script>
@endpush
