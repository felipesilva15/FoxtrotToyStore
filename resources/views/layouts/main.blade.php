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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="d-flex justify-content-between align-items-center px-3 py-4">
        <div class="logo p-1">
            <img src="images/Logo.png" class="default-size" alt="Logo">
        </div>
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
                <form action="/login" method="post" class="dropdown-menu p-4" style="width: 300px">
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
    <footer>

    </footer>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
