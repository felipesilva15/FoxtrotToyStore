<div type="button" class="position-relative d-inline">
    <a href="{{ route('cart') }}" class="text-reset text-decoration-none material-icons md-36 md-dark ms-2 hand-cursor">shopping_cart</a>
    @auth
        @if (Auth::user()->CartItems->sum('ITEM_QTD'))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ Auth::user()->CartItems->sum('ITEM_QTD') }}
                <span class="visually-hidden">Itens no carrinho</span>
            </span> 
        @endif
    @endauth
</div>
