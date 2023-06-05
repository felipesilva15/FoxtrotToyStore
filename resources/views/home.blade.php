@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section id="primeira-secao" class="d-flex flex-column align-items-center py-5 ">
        <div class="container">
            <div id="carouselExampleAutoplaying" class="carousel slide w-100 custom-shadow rounded-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item rounded">
                        <img src="{{ asset('images/card4.png') }}" class="d-block img-fluid m-0" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/card3.png') }}" class="d-block img-fluid m-0" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/card2.png') }}" class="d-block img-fluid m-0" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('images/card1.png') }}" class="d-block img-fluid m-0" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section id="secao-imagens" class="py-5">
        <div>
            <h2 class="pb-5 m-0 fw-bold text-center">Principais Marcas</h2>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="circle-container">
                        <img src="{{ asset('images/marca1.png') }}" alt="Marca 1" class="logo-image img-fluid">
                    </div>
                </div>
                <div class="col-2">
                    <div class="circle-container">
                        <img src="{{ asset('images/marca2.png') }}" alt="Marca 2" class="logo-image img-fluid">
                    </div>
                </div>
                <div class="col-2">
                    <div class="circle-container">
                        <img src="{{ asset('images/marca3.png') }}" alt="Marca 3" class="logo-image img-fluid">
                    </div>
                </div>
                <div class="col-2">
                    <div class="circle-container">
                        <img src="{{ asset('images/marca4.png') }}" alt="Marca 4" class="logo-image img-fluid">
                    </div>
                </div>
                <div class="col-2">
                    <div class="circle-container">
                        <img src="{{ asset('images/marca5.png') }}" alt="Marca 5" class="logo-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="segunda-secao" class="d-flex flex-column align-items-center py-5">
        <div>
            <h2 class="pb-5 m-0 fw-bold text-center">Brinquedos mais vendidos</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($productsBestSellings as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-0">
                        @include('components.product-card', $product)
                    </div>
                @endforeach
            </div>
            <div class="d-flex align-items-end flex-column w-100">
                <a href="{{ route('product', ['sort' => '6']) }}"
                    class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
                    <div class="fw-bold fs-5 me-1">Ver mais</div>
                    <div class="material-icons mt-1 hand-cursor">double_arrow</div>
                </a>
            </div>
        </div>
    </section>
    <section id="terceira-secao" class="d-flex flex-column align-items-center py-5">
        <div>
            <h2 class="pb-5 m-0 fw-bold text-center">Sobre nós</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="d-block justify-content-center">
                    <h3>Bem-vindo à FoxTrotStore - Onde a diversão ganha vida!</h3>
                    <br>
                    <div class="text-center text-justify">
                        <p>Na FoxTrotStore, nós acreditamos que a infância é um tempo muito especial e cheio de descobertas
                            incríveis. Nossa loja nasceu de um projeto super legal criado por um grupo de amigos durante a
                            faculdade. Nós amamos brinquedos e queremos que você e seus pais tenham uma experiência única ao
                            comprá-los!</p>
                        <p>Nosso objetivo é proporcionar momentos de alegria, imaginação e aprendizado através de uma
                            cuidadosa seleção de brinquedos de alta qualidade. Entendemos a importância do desenvolvimento
                            infantil e, por isso, oferecemos uma ampla variedade de produtos que estimulam a criatividade, o
                            raciocínio lógico, a coordenação motora e o desenvolvimento emocional.</p>
                        <p>Na FoxTrotStore, nós valorizamos muito a honestidade e a confiança. Trabalhamos muito para
                            garantir que sua compra online seja segura e fácil. Descrevemos todos os nossos produtos com
                            cuidado e mostramos imagens detalhadas, assim você sabe exatamente o que está comprando. Além
                            disso, oferecemos opções legais de pagamento e entregamos seus pedidos rapidinho!</p>
                        <p>Agradecemos muito por escolher a FoxTrotStore como o lugar para comprar seus brinquedos. Mal
                            podemos esperar para ajudar você a criar memórias incríveis e momentos mágicos com seus pais.
                            Explore nossa seleção e solte a imaginação!</p>

                        <p>Equipe FoxTrotStore</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="quarta-secao" class="d-flex flex-column align-items-center py-5">
        <div>
            <h2 class="pb-5 m-0 fw-bold text-center">Brinquedos com melhores descontos</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($productsBestDiscounts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-0">
                        @include('components.product-card', $product)
                    </div>
                @endforeach
            </div>
            <div class="d-flex align-items-end flex-column w-100">
                <a href="{{ route('product', ['sort' => '7']) }}"
                    class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
                    <div class="fw-bold fs-5 me-1">Ver mais</div>
                    <div class="material-icons mt-1 hand-cursor">double_arrow</div>
                </a>
            </div>
        </div>
    </section>
    <section id="quinta-secao" class="py-5">
        <div class="container d-flex flex-column align-items-center">
                <img src="{{ asset('images/frete.png') }}" alt="Frete-Off" class="logo-image img-fluid  custom-shadow rounded-4">
        </div>
    </section>
@endsection
