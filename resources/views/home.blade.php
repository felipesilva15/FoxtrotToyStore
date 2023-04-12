@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section id="primeira-secao" class="p-0">
      <div id="carouselExampleAutoplaying" class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/card1.png') }}" class="d-block w-100 m-0" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/card2.png') }}" class="d-block w-100 m-0" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/card3.png') }}" class="d-block w-100 m-0" alt="...">
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
            <a href="#" class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
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
            <a href="#" class="d-flex align-items-center justify-content-center text-primary text-decoration-none">
              <div class="fw-bold fs-5 me-1">Ver mais</div>
              <div class="material-icons mt-1 hand-cursor">double_arrow</div>
            </a>
          </div>
        </div>
    </section>
@endsection
