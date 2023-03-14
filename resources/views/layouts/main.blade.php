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
    <header class="d-flex justify-content-between align-items-center p-3">
        <div class="logo p-1">
            <img src="images/Logo.png" class="default-size" alt="Logo">
        </div>
        <div class="search-bar">
            @include('includes.productSearch')
        </div>
        <div>
            <span class="material-icons md-36 md-light">shopping_cart</span>
            <span class="material-icons md-36 md-light">account_circle</span>
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
