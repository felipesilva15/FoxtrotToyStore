@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="bg-light rounded-5 p-5 m-auto w-min">
                <h2 class="">Produtos</h2>
            </div>
            <div class="mx-auto my-4 w-min">
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
                            <select class="form-select" id="sort" name="sort">
                                <option {{ !request('sort') ? 'selected' : '' }}>-- Selecione --</option>
                                <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Menor preço</option>
                                <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Maior preço</option>
                                <option value="3" {{ request('sort') == 3 ? 'selected' : '' }}>Nome de A-Z</option>
                                <option value="4" {{ request('sort') == 4 ? 'selected' : '' }}>Nome de Z-A</option>
                                <option value="5" {{ request('sort') == 5 ? 'selected' : '' }}>Categoria</option>
                                <option value="6" {{ request('sort') == 6 ? 'selected' : '' }}>Mais vendidos</option>
                                <option value="7" {{ request('sort') == 7 ? 'selected' : '' }}>Melhores descontos</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center mb-1 col-4">
                            <span class="material-icons mt-1 ms-1 me-2 text-primary">apps</span>
                            <span class="fw-bold fs-5 me-2">Exibir</span>
                            <select class="form-select" id="per_page" name="per_page">
                                <option {{ !request('per_page') ? 'selected' : '' }}>12 por página</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24 por página</option>
                                <option value="32" {{ request('per_page') == 32 ? 'selected' : '' }}>32 por página</option>
                                <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48 por página</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mb-1 col-2">
                            <span>Produtos: <span class="fw-bold">{{ $products->total() }}</span></span>
                        </div>
                        <div class="d-flex align-items-center mb-1 col-2">
                            <button class="btn btn-primary d-flex w-100 justify-content-center align-items-center" id="searchButton">
                                <span class="fw-bold">Filtrar</span>
                                <span class="material-icons ms-1 hand-cursor">search</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="row">
                            @if(count($products))
                                @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-0">
                                        @include('components.product-card', $product)
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center py-4">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
                                                <a class="page-link" id="previous-page" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            @for($i = 1; $i <= $products->lastPage(); $i++)
                                                <li class="page-item">
                                                    <a class="page-link page-link-button {{ $products->currentPage() == $i ? 'active' : '' }}" href="#" page_number="{{ $i }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                                                <a class="page-link" id="next-page" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            @else
                                <p class="text-center fw-bold fs-5">Nenhum produto encontrado!</p>
                            @endif
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