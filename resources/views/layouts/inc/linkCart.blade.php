<div type="button" class="position-relative d-inline">
    <a href="{{ route('cart') }}" class="text-reset text-decoration-none material-icons md-36 md-dark ms-2 hand-cursor">shopping_cart</a>
    @auth
        @if (isset($cartUser->QT_ITENS) && !empty($cartUser->QT_ITENS))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $cartUser->QT_ITENS }}
                <span class="visually-hidden">Itens no carrinho</span>
            </span>
        @endif
    @endauth
</div>
