@extends('layouts.main')

@section('title', 'Meus pedidos')

@section('content')
    <section class="my-5">
        <div class="m-auto text-center mb-5">
            <h2>Meus pedidos</h2>
        </div>
        {{-- <div class="container shadow rounded p-4">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center mb-4">
                    <span class="material-icons ms-1 me-2 md-24 text-primary">tune</span>
                    <span class="fw-bold fs-4">Filtros</span>
                </div>
            </div>
        </div> --}}
        <div class="container shadow rounded p-4 mt-5">
            @if (count($orders))
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-4">
                        <span class="material-icons ms-1 me-2 md-24 text-primary">list_alt</span>
                        <span class="fw-bold fs-4">Pedidos</span>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Data</th>
                                <th scope="col">Qtd. Itens</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->OrderNumber() }}</th>
                                    <td>{{ $order->Date() }}</td>
                                    <td>{{ $order->OrderQtyItems() }}</td>
                                    <td class="text-primary fw-bold">R$ {{ $order->OrderTotal() }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('order.show', ['order' => $order->PEDIDO_ID]) }}"
                                                class="btn btn-outline-primary">Detalhes do pedido</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center fs-5 m-0">Nenhum pedido registrado.</p>
            @endif
        </div>
    </section>
@endsection
