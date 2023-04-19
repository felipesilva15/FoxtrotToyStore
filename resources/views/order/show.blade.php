@extends('layouts.main')

@section('title', "Pedido {$order->PEDIDO_ID}")

@section('content')
  <section class="my-5">
    <div class="m-auto text-center mb-5">
      <h2>Pedido {{ $order->PEDIDO_ID }}</h2>
    </div>
  </section>
@endsection