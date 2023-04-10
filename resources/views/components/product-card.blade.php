<div class="d-flex flex-column bg-white rounded p-2 shadow m-3 align-self-stretch" style="">
    <div>
        <img class="w-100 image-fit" src="{{ isset($product->ProductImages[0]->IMAGEM_URL) ? $product->ProductImages[0]->IMAGEM_URL : asset('images/produto-sem-foto.jpg') }}" alt="Imagem do produto">
        {{-- <img src="{{ isset($product->ProdutoImagem[0]->IMAGEM_URL) ? $product->ProdutoImagem[0]->IMAGEM_URL : '' }}" alt="Imagem do produto"> --}}
    </div>
    <div class="d-flex flex-column justify-content-start text-start mb-3 mt-2">
        <span class="fw-bold fs-5" >{{ $product->PRODUTO_NOME ?? '' }}</span>
        <span class="text-secondary-emphasis">{{ $product->Category->CATEGORIA_NOME ?? '' }}</span>
        <div class="mt-2">
            <span class="fs-5 me-2">R$ {{ number_format($product->PRODUTO_PRECO - $product->PRODUTO_DESCONTO, 2, ',', '')}}</span>
            @if($product->PRODUTO_DESCONTO != 0)
                <span class="text-secondary"><s>R$ {{ number_format($product->PRODUTO_PRECO ?? 0, 2, ',', '') }}</s></span>
            @endif
        </div>
    </div>
    <div>
        <div>

        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ url('product/'.$product->PRODUTO_ID) }}" class="text-decoration-none w-100">
                <button class="btn btn-primary d-flex w-100 justify-content-center">
                    <span class="material-icons md-24 me-1 hand-cursor">shopping_cart</span>
                    <span>Comprar</span>
                </button>
            </a>
        </div>
    </div>
</div>