@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section id="primeira-secao" class="d-flex flex-column align-items-center py-5 ">
        <div class="container">
            <div id="carouselExampleAutoplaying" class="carousel slide w-100 custom-shadow rounded" data-bs-ride="carousel">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
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
            <a href="{{ route('product', ['sort' => '6']) }}" class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
              <div class="fw-bold fs-5 me-1">Ver mais</div>
              <div class="material-icons mt-1 hand-cursor">double_arrow</div>
            </a>
          </div>
        </div>
    </section>
    <section id="terceira-secao"  class="d-flex flex-column align-items-center py-5">
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
            <a href="{{ route('product', ['sort' => '7']) }}" class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
              <div class="fw-bold fs-5 me-1">Ver mais</div>
              <div class="material-icons mt-1 hand-cursor">double_arrow</div>
            </a>
          </div>
        </div>
    </section>
@endsection
