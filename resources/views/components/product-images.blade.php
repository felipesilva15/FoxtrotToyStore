@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product-carrousel.css') }}">
@endpush

<div class="d-flex flex-column">
    <div class="d-flex p-2 border rounded" style="height: 320px">
        <img class="w-100 image-fit" id="product-image-active"
            src="{{ isset($productImages[0]->IMAGEM_URL) ? $productImages[0]->IMAGEM_URL : asset('images/produto-sem-foto.jpg') }}"
            alt="Imagem do produto">
    </div>
    <div>
        <div id="product-images" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner p-3 pt-2">
                @foreach ($productImages as $image)
                    <div class="carousel-item hand-cursor">
                        <div class="px-1">
                            <div class="p-1 border rounded">
                                <img class="w-100 image-fit" src="{{ $image->IMAGEM_URL }}" alt="Imagem do produto">
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!$productImages || !count($productImages))
                    <div class="carousel-item hand-cursor">
                        <div class="px-1">
                            <div class="p-1 border rounded">
                                <img class="w-100 image-fit" src="{{ asset('images/produto-sem-foto.jpg') }}"
                                    alt="Imagem do produto">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="material-icons fs-1 hand-cursor" aria-hidden="true">chevron_left</span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="material-icons fs-1 hand-cursor" aria-hidden="true">chevron_right</span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/product-images.js') }}"></script>
@endpush
