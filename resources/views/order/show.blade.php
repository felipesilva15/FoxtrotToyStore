@extends('layouts.main')

@section('title', "Pedido {$order->OrderNumber()}")

@section('content')
    <section class="my-5">
        <div class="m-auto text-center">
            <h2>Pedido</h2>
        </div>
        <div class="container shadow rounded p-4 mt-5">
            <div class="d-flex justify-content-between">
                <span class="fw-bold fs-5">Nr. pedido {{ $order->OrderNumber() }}</span>
                <span>{{ $order->Date() }}</span>
            </div>
            <div class="mt-2">
                <span class="fw-bold">Status: </span>
                <span>{{ $order->OrderStatus->STATUS_DESC }}</span>
            </div>
            <div class="mt-2">
                <span class="fw-bold">Cliente: </span>
                <span>{{ $order->User->USUARIO_NOME }}</span>
            </div>
            <div class="mt-2">
                <span class="fw-bold">CPF: </span>
                <span class="cpfTextMask">{{ $order->User->USUARIO_CPF }}</span>
            </div>
            <div class="mt-2 mb-5">
                <span class="fw-bold">Endereço de entrega: </span>
                {{-- @if ($order->User->activeAddress())
                    <span>{{ $order->User->activeAddress()->FormattedAddress() }}</span>
                @endif --}}
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr class="fs-5">
                            <th scope="col" class="d-flex align-items-center">
                                <span class="material-icons ms-1 me-2 text-primary">shopping_basket</span>
                                <span class="fw-bold">Produto(s)</span>
                            </th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->OrderItems as $item)
                            <tr>
                                <td class="d-flex">
                                    <a href="{{ route('product.show', ['product' => $item->product->PRODUTO_ID]) }}" style="width: 140px">
                                        <img class="w-100 image-fit"
                                            src="{{ isset($item->product->OrderedProductImages()[0]->IMAGEM_URL) ? $item->product->OrderedProductImages()[0]->IMAGEM_URL : $item->product->DefaultProductImage() }}"
                                            class="card-img-top" alt="">
                                    </a>
                                    <div class="d-flex flex-column flex-fill px-3">
                                        <a href="{{ route('product.show', ['product' => $item->product->PRODUTO_ID]) }}" class="text-reset text-decoration-none fw-bold fs-5">{{ $item->product->PRODUTO_NOME }}</a>
                                        <span
                                            class="text-secondary-emphasis fw-bold">{{ $item->product->category->CATEGORIA_NOME }}</span>
                                        <span class="text-secondary-emphasis">Quantidade: {{ $item->ITEM_QTD }}</span>
                                    </div>
                                </td>
                                <td class="fs-6 fw-bold text-primary text-end">R$ {{ $item->ItemTotal() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td>Frete</td>
                            <td class="text-end">Grátis</td>
                        </tr>
                        <tr class="fw-bold fs-5 bg-secondary bg-gradient bg-opacity-10">
                            <td>Total do pedido</td>
                            <td class="text-primary text-end">R$ {{ $order->OrderTotal() }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
