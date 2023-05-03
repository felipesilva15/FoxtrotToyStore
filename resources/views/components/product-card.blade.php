<a href="{{ route('product.show', ['product' => $product->PRODUTO_ID]) }}" class="text-decoration-none text-reset">
    <div class="d-flex flex-column bg-white rounded p-2 shadow m-2 align-self-stretch product-card">
        @if ($product->PRODUTO_DESCONTO != 0 && isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0)
            <div class="position-absolute">
                <div class="py-1 px-2 bg-primary rounded m-1">
                    <span class="text-light fs-7 fw-bold">-{{ round($product->PRODUTO_DESCONTO / ($product->PRODUTO_PRECO / 100), 0) }}%</span>
                </div>
            </div>
        @endif
        <div>
            <img class="w-100 image-fit" src="{{ isset($product->OrderedProductImages()[0]->IMAGEM_URL) ? $product->OrderedProductImages()[0]->IMAGEM_URL : $product->DefaultProductImage() }}" alt="Imagem do produto">
        </div>
        <div class="d-flex flex-column justify-content-start text-start mb-3 mt-2">
            <span class="fw-bold fs-5 text-nowrap overflow-hidden" data-bs-toggle="tooltip" data-bs-title="Default tooltip">{{ $product->PRODUTO_NOME ?? '' }}</span>
            <span class="text-secondary-emphasis">{{ $product->Category->CATEGORIA_NOME ?? '' }}</span>
            <div class="mt-2">
                @if(isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0)
                    <span class="fs-5 fw-bold me-1 text-primary">R$ {{ number_format($product->PRODUTO_PRECO - $product->PRODUTO_DESCONTO, 2, ',', '')}}</span>
                    @if($product->PRODUTO_DESCONTO != 0)
                        <span class="text-secondary"><s>R$ {{ number_format($product->PRODUTO_PRECO ?? 0, 2, ',', '') }}</s></span>
                    @endif
                @else
                    <span class="fs-5 fw-bold me-1 text-secondary">R$ --,--</span>
                @endif
            </div>
        </div>
        <div>
            <div>

            </div>
            <div class="d-flex justify-content-center">
                @if(isset($product->ProductStock->PRODUTO_QTD) && $product->ProductStock->PRODUTO_QTD != 0)
                    <form action="{{ route('cart.store', ['product' => $product->PRODUTO_ID]) }}" class="w-100" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary d-flex w-100 justify-content-center">
                            <span class="material-icons md-24 me-1 hand-cursor">shopping_cart</span>
                            <span class="fw-bold">Comprar</span>
                        </button>
                    </form>
                @else
                <button type="submit" class="btn btn-secondary d-flex w-100 justify-content-center disabled">
                    <span class="material-icons md-24 me-1 hand-cursor">cancel</span>
                    <span class="fw-bold">Indisponível</span>
                </button>
                @endif
            </div>
        </div>
    </div>
</a>