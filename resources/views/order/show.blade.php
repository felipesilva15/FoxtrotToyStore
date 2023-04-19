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
			<div class="mt-2 mb-5">
				<span class="fw-bold">Status: </span>
				<span>{{ $order->OrderStatus->STATUS_DESC }}</span>
			</div>
			<div>
				<div class="d-flex flex-column">
					<div class="d-flex align-items-center mb-4">
						<span class="material-icons ms-1 me-2 text-primary">shopping_basket</span>
						<span class="fw-bold fs-6">Produto(s)</span>
					</div>
					@foreach ($order->OrderItems as $item)
						<div class="w-100 d-flex">
							<div style="width: 140px">
								<img class="w-100 image-fit" src="{{ isset($item->product->ProductImages[0]->IMAGEM_URL) ? $item->product->ProductImages[0]->IMAGEM_URL : asset('images/produto-sem-foto.jpg') }}" class="card-img-top" alt="">
							</div>
							<div class="d-flex flex-column flex-fill px-3">
								<span class="fw-bold fs-5">{{ $item->product->PRODUTO_NOME }}</span>
								<span class="text-secondary-emphasis">{{ $item->product->category->CATEGORIA_NOME }}</span>
							</div>
							<div class="d-flex flex-column mx-3 align-items-center">
								<span>Qtd.</span>
								<div class="d-flex justify-content-center align-items-center mb-3">
									<span class="fw-bold mx-2">{{ $item->ITEM_QTD }}</span>
								</div>
							</div>
							<div class="d-flex flex-column text-end" style="width: 140px">
								<span class="fw-bold fs-5">Total</span>
								<span class="fs-6 fw-bold text-primary">R$ {{ $item->ItemTotal() }}</span>
							</div>
						</div>
						@if ($loop->index < count($order->OrderItems) - 1)
							<hr>
						@endif
					@endforeach
					<hr class="border-2">
					<div class="d-flex justify-content-between">
						<span class="fw-bold">Frete</span>
						<span>Grátis</span>
					</div>
					<hr>
					<div class="d-flex justify-content-between fs-5">
						<span class="fw-bold">Total do pedido</span>
						<span class="fw-bold text-primary">R$ {{ $order->OrderTotal() }}</span>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection