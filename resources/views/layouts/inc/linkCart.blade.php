<div type="button" class="position-relative d-inline">
    <a href="{{ route('cart') }}" class="text-reset text-decoration-none material-icons md-36 md-dark ms-2 hand-cursor">shopping_cart</a>
    @auth
        {!! app(App\Http\Controllers\CartController::class)->searchQtyItems() !!}
    @endauth
</div>
