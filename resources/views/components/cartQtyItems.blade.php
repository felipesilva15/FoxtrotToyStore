@if ($qtyItems)
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ $qtyItems }}
        <span class="visually-hidden">Itens no carrinho</span>
    </span> 
@endif