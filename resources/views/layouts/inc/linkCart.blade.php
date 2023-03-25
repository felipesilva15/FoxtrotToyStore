<div type="button" class="position-relative d-inline">
    <span class="material-icons md-36 md-dark ms-2 hand-cursor">shopping_cart</span>
    @auth
        @if (isset($cartUser->QT_ITENS) && !empty($cartUser->QT_ITENS))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $cartUser->QT_ITENS }}
                <span class="visually-hidden">Itens no carrinho</span>
            </span>
        @endif
    @endauth
</div>
