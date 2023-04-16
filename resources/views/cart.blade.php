@extends('layouts.main')

@section('content')
    <h1>Carrinho de Compras</h1>
    @if($cartItems->isEmpty())
        <p>O carrinho está vazio.</p>
    @else
<div class="row">
  @foreach (Cart::content() as $item)
  <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-0">
    <div class="card">
        <img src="{{ $item->model->image_url }}" class="card-img-top" alt="{{ $item->model->name }}">
      <div class="card-body">
        <h5 class="card-title">{{ $item->model->name }}</h5>
        <p class="card-text">Preço: R$ {{ $item->model->price }}</p>
        <p class="card-text">Quantidade: {{ $item->qty }}</p>
        <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Remover</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">Resumo do carrinho</h5>
    <table class="table">
      <tbody>
        <tr>
          <td>Subtotal:</td>
          <td>R$ {{ Cart::subtotal() }}</td>
        </tr>
        <tr>
          <td>Taxa:</td>
          <td>R$ {{ Cart::tax() }}</td>
        </tr>
        <tr>
          <td>Total:</td>
          <td>R$ {{ Cart::total() }}</td>
        </tr>
      </tbody>
    </table>
    <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-block">Checkout</a>
  </div>
</div>
    @endif
@endsection
