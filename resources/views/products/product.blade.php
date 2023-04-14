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
                <div class="pe-3 col-2">
                    <div class="d-flex align-items-center mb-1">
                        <span class="material-icons mt-1 ms-1 me-2 text-primary">tune</span>
                        <span class="fw-bold fs-5">Filtros</span>
                    </div>
                    <div class="d-flex flex-column shadow rounded p-3">
                        <div class="mb-2">
                            <span class="fw-bold">Preço</span>
                            <input type="range" class="w-100" min="0" max="999" id="priceRange" name="price" value="{{ request('price') ? request('price') : '999' }}">
                            <div class="d-flex justify-content-between">
                                <span class="fs-7">R$ 0,00</span>
                                <span class="fs-7" id="priceMaxRange">R$ 999,00</span>
                            </div>
                        </div>
                        <div>
                            <span class="fw-bold mb-1">Categorias</span>
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->CATEGORIA_ID }}" id="catFilter{{ $category->CATEGORIA_ID }}" name="categories[]" {{ request('categories') && in_array($category->CATEGORIA_ID, request('categories')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="catFilter{{ $category->CATEGORIA_ID }}">{{ $category->CATEGORIA_NOME }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="d-flex align-items-center mb-1 col-4">
                            <span class="material-icons mt-1 ms-1 me-2 text-primary">swap_vert</span>
                            <span class="fw-bold fs-5 me-2">Ordenar</span>
                            <select class="form-select" aria-label="Default select example" id="sort" name="sort">
                                <option {{ !request('sort') ? 'selected' : '' }}>-- Selecione --</option>
                                <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Menor preço</option>
                                <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Maior preço</option>
                                <option value="3" {{ request('sort') == 3 ? 'selected' : '' }}>Nome de A-Z</option>
                                <option value="4" {{ request('sort') == 4 ? 'selected' : '' }}>Nome de Z-A</option>
                                <option value="5" {{ request('sort') == 5 ? 'selected' : '' }}>Categoria</option>
                                <option value="6" {{ request('sort') == 6 ? 'selected' : '' }}>Mais vendidos</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center mb-1 offset-7 col-1">
                            <button class="btn btn-primary" id="searchButton">Filtrar</button>
                        </div>
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
    </section>
@endsection

@push('scripts')
    <script src="js/product-index.js"></script>
@endpush