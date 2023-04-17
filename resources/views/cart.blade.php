@extends('layouts.main')

@section('title', 'Carrinho de compras')

@section('content')
  <section class="my-5">
    <div class="m-auto text-center mb-5">
      <h2>Carrinho de Compras</h2>
    </div>
    <div class="container shadow rounded p-4">
      @if(!$cartItems->isEmpty())
        <div class="d-flex flex-column">
          <div class="d-flex align-items-center mb-4">
            <span class="material-icons ms-1 me-2 text-primary">shopping_basket</span>
            <span class="fw-bold fs-5">Produtos</span>
          </div>
          @foreach ($cartItems as $item)
            <div class="w-100 d-flex">
              <div style="width: 140px">
                <img class="w-100 image-fit" src="{{ isset($item->produto->ProductImages[0]->IMAGEM_URL) ? $item->produto->ProductImages[0]->IMAGEM_URL : asset('images/produto-sem-foto.jpg') }}" class="card-img-top" alt="">
              </div>
              <div class="d-flex flex-column flex-fill px-3">
                <span class="fw-bold fs-5">{{ $item->produto->PRODUTO_NOME }}</span>
                <span class="text-secondary-emphasis">{{ $item->produto->category->CATEGORIA_NOME }}</span>
                <div>
                  <span class="fw-bold text-primary">R$ {{ number_format($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2, ',', '')}}</span>
                  @if($item->produto->PRODUTO_DESCONTO != 0)
                    <span class="text-secondary fs-7"><s>R$ {{ number_format($item->produto->PRODUTO_PRECO ?? 0, 2, ',', '') }}</s></span>
                  @endif
                </div>
              </div>
              <div class="d-flex flex-column mx-3 align-items-center">
                <span>Qtd.</span>
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <span class="material-icons hand-cursor">chevron_left</span>
                  <span class="fw-bold mx-2">{{ $item->ITEM_QTD }}</span>
                  <span class="material-icons hand-cursor">chevron_right</span>
                </div>
                <div>
                  <form action="{{ url('cart/'.$item->PRODUTO_ID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger material-icons md-24">delete</button>
                  </form>
                </div>
              </div>
              <div class="d-flex flex-column text-end" style="width: 140px">
                <span class="fw-bold fs-5">Total</span>
                <span class="fs-5 fw-bold text-primary">R$ {{ number_format(($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD, 2, ',', '')}}</span>
              </div>
            </div>
            @if ($loop->index < count($cartItems) - 1)
              <hr>
            @endif
          @endforeach
        </div>
      @else
        <p class="text-center fs-5">O carrinho está vazio. <a href="{{ route('product') }}">Ir as compras</a></p>
      @endif
    </div>
    <div class="mt-5 shadow rounded p-4 container">
      <div class="d-flex align-items-center mb-4">
        <span class="material-icons mt-1 ms-1 me-2 text-primary">list_alt</span>
        <span class="fw-bold fs-5">Resumo do pedido</span>
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
        <div class="d-flex align-items-stretch mt-3 flex-wrap">
          <a href="#" class="btn btn-primary me-2">Finalizar compra</a>
          <a href="{{ route('product') }}" class="btn btn-outline-primary">Continuar comprando</a>
        </div>
      </div>
    </div>
  </section>
@endsection
