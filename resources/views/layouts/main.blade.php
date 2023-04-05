<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Boostrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Bootstrap icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- JQuery CSS --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {{-- CSS principal --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- CSS Home --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- CSS views --}}
    @stack('styles')
</head>
<body>
    <header>
        <div class="d-flex justify-content-between align-items-center px-5 py-2 bg-white shadow">
            <a href="{{ url('/') }}">
                <div class="logo p-1">
                    <img src="{{ asset('images/Logo.png') }}" class="default-size" alt="Logo">
                </div>
            </a>
            <div id="search-bar" class="px-4 default-width">
                @include('layouts.inc.productSearch')
            </div>
            <div>
                @include('layouts.inc.linkCart')
                @include('layouts.inc.userDropdown')
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
        <footer class="pt-4">
            <div class="d-flex flex-column pt-5 text-light">
                <div class="d-flex justify-content-between flex-column flex-md-row mb-4 mx-5 gap-5">
                    <div class="mx-1">
                        <a href="{{ url('/') }}">
                            <div class="logo p-1">
                                <img src="{{ asset('images/Logo.png') }}" class="default-size" alt="Logo">
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column mx-1">
                        <span class="fs-5 fw-bold mb-3">Atendimento ao cliente</span>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope pe-1 fs-5"></i>
                            <a class="text-reset" href="mailto:sac@foxtrot.com">sac@foxtrot.com</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone pe-1 fs-5"></i>
                            <a>(11) 5555-3838</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-whatsapp pe-1 fs-5"></i>
                            <a class="text-reset" href="https://api.whatsapp.com/send?phone=5511954452800">(11) 95445-2800</a>
                        </div>
                    </div>
                    <div class="d-flex flex-column mx-1">
                        <span class="fs-5 fw-bold mb-3">Redes sociais</span>
                        <div class="d-flex gap-2 fs-5">
                            <a class="text-reset" href="https://www.facebook.com/">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a class="text-reset" href="https://www.instagram.com/">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a class="text-reset" href="https://www.linkedin.com/">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column mx-1">
                        <span class="fs-5 fw-bold mb-3">Métodos de pagamento</span>
                        <div class="d-flex gap-2 fs-5">
                            <i class="bi bi-credit-card"></i>
                            <i class="bi bi-paypal"></i>
                            <i class="bi bi-bank"></i>
                            <i class="bi bi-wallet2"></i>
                        </div>
                    </div>
                </div>
                <div class="mx-5">
                    <div class="mx-5">
                        <hr class="default-width opacity-50">
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center default-width">
                    <p class="m-0 fs-5">© 2023 Foxtrot Toy Store</p>
                    <p>Todos os direitos reservados</p>
                </div>
            </div>
        </footer>

    {{-- Boostrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- JQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    {{-- Toast Messages --}}
    @include('layouts.inc.toastMessages')

    {{-- JS views --}}
    @stack('scripts')
</body>
</html>
