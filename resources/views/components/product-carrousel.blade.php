@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product-carrousel.css') }}">
@endpush

<div id="product-carrousel" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner p-3">
        @foreach ($products as $product)
            <div class="carousel-item">
                @include('components.product-card', $product)
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="material-icons fs-1 hand-cursor" aria-hidden="true">chevron_left</span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="material-icons fs-1 hand-cursor" aria-hidden="true">chevron_right</span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@push('scripts')
    <script src="{{ asset('js/product-carrousel.js') }}"></script>
@endpush