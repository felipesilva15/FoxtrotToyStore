@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="bg-light rounded-5 p-5 m-auto" style="width: min-content">
                <h2 class="">Produtos</h2>
            </div>
            <div class="mx-auto my-4" style="width: min-content">
                @include('components.breadcrumb', $breadcrumbRoutes)
            </div>
            <div class="row">
                <div class="pe-4 col-2">
                    <div class="d-flex align-items-center mb-1">
                        <span class="material-icons mt-1 ms-1 me-2 text-primary">tune</span>
                        <span class="fw-bold fs-5">Filtros</span>
                    </div>
                    <div class="d-flex flex-column shadow rounded p-3">
                        <div>
                            <span class="fw-bold">Preço</span>
                            <input type="range" class="form-range" min="0" max="999" id="customRange2">
                        </div>
                        <div>
                            <span class="fw-bold">Categorias</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="catJogos">
                                <label class="form-check-label" for="catJogos">Jogos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="catBonecas">
                                <label class="form-check-label" for="catBonecas">Bonecas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="catJogosEletronicos">
                                <label class="form-check-label" for="catJogosEletronicos">Jogos eletrônicos</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div>
                        <div class="d-flex align-items-center mb-1 col-4">
                            <span class="material-icons mt-1 ms-1 me-2 text-primary">swap_vert</span>
                            <span class="fw-bold fs-5 me-2">Ordenar</span>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>-- Selecione --</option>
                                <option value="1">Menor preço</option>
                                <option value="1">Maior preço</option>
                                <option value="2">Nome de A-Z</option>
                                <option value="3">Nome de Z-A</option>
                                <option value="3">Categoria</option>
                                <option value="3">Mais vendidos</option>
                            </select>
                        </div>
                        <hr>
                        <div>
                            <div class="row">
                                @foreach ($products as $product)
                                  <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-0">
                                    @include('components.product-card', $product)
                                  </div>
                                @endforeach
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
