<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- CSS views -->
    @stack('styles')
</head>
<body>
    <header class="d-flex justify-content-between align-items-center px-3 py-4">
        <a href="{{ url('/') }}">
            <div class="logo p-1">
                <img src="images/Logo.png" class="default-size" alt="Logo">
            </div>
        </a>
        <div id="search-bar">
            @include('layouts.inc.productSearch')
        </div>
        <div>
            <div type="button" class="position-relative d-inline">
                <span class="material-icons md-36 md-light ms-2 hand-cursor">shopping_cart</span>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  10
                  <span class="visually-hidden">unread messages</span>
                </span>
            </div>
            <div class="dropstart d-inline">
                <div class="dropdown-toggle d-inline" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-offset="15,15">
                    <span class="material-icons md-36 md-light ms-3 hand-cursor">account_circle</span>
                </div>
                <form action="/login" method="post" class="dropdown-menu p-4" style="width: 320px">
                    @csrf
                    <h3 class="text-center mb-3">Login</h3>
                    <div class="mb-2">
                        <label for="login-email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" placeholder="email@example.com" id="login-email" name="email">
                    </div>
                    <div class="mb-2">
                        <label for="login-password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="login-password" placeholder="Senha" name="password">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <a href="{{ url('/register') }}">Cadastre-se</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
              </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="pt-4">
        <div class="d-flex flex-column pt-5 text-light">
            <div class="d-flex justify-content-between mb-4 mx-5">
                <div class="mx-1">
                    <a href="{{ url('/') }}">
                        <div class="logo p-1">
                            <img src="images/Logo.png" class="default-size" alt="Logo">
                        </div>
                    </a>
                </div>
                <div class="d-flex flex-column mx-1">
                    <span class="fs-5 fw-bold mb-3">Atendimento ao cliente</span>
                    <a class="text-reset" href="mailto:sac@foxtrot.com">sac@foxtrot.com</a>
                    <a>(11) 5555-3838</a>
                    <a class="text-reset" href="https://api.whatsapp.com/send?phone=5511954452800">(11) 95445-2800</a>
                </div>
                <div class="d-flex flex-column mx-1">
                    <span class="fs-5 fw-bold mb-3">Redes sociais</span>
                    <a class="text-reset" href="https://www.facebook.com/">Facebook</a>
                    <a class="text-reset" href="https://www.instagram.com/">Instagram</a>
                    <a class="text-reset" href="https://www.linkedin.com/">LinkedIn</a>
                </div>
                <div class="d-flex flex-column mx-1">
                    <span class="fs-5 fw-bold mb-3">Métodos de pagamento</span>
                </div>
            </div>
            <div class="mx-5">
                <div class="mx-5">
                    <hr class="default-width opacity-50">
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center default-width">
                <p class="m-0 fs-5">© Copyright 2023 - Foxtrot Toy Store</p>
                <p>Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- JS views -->
    @stack('scripts')
</body>
</html>
