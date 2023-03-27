@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section id="primeira-secao">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item1 active">
                <img src="images/imgprincipal.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
    </section>
    <section id="segunda-secao">
        <div>
            <h2>Brinquedos mais Vendidos</h2>
        </div>
        <div class="break"></div> <!-- break -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/logo.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/logo.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/logo.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section id="terceira-secao">
        <h2>Escolha sua Diversão</h2>
        <div class="cardscategorias">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body" onclick="acessarProdutoCategoria()">
                  <h5 class="text-justify">Eletrônicos</h5>
                </div>
            </div>
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body" onclick="acessarProdutoCategoria()">
                  <h5 class="text-justify">Tabuleiros</h5>
                </div>
            </div>
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body" onclick="acessarProdutoCategoria()">
                  <h5 class="text-justify">Educativos</h5>
                </div>
            </div>
            <div class="break"></div> <!-- break -->
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body" onclick="acessarProdutoCategoria()">
                  <h5 class="text-justify">Interativos</h5>
                </div>
            </div>
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body" onclick="acessarProdutoCategoria()">
                  <h5 class="text-justify">Pintura</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- QUERO CRIAR UMA FUNÇÃO PARA O "ONCLICK" DAS DIVS DE CATEGORIA DA PAGINA HOME
         A IDEIA É QUE QUANDO O USUARIO CLICAR, LEVE ELE PARA PAGINA DE PRODUTO, COM A CATEGORIA FILTRADA.
        <script>
        function acessarProdutoCategoria(){
            let texto = document.getElementById().textContent;
            window.location.href = 'http://127.0.0.1:8000/?texto=' + encodeURIComponent(texto);
        }
    </script> -->
@endsection
