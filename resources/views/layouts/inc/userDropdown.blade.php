<div class="dropstart d-inline">
    <div class="dropdown d-inline" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-offset="15,15">
        <span class="material-icons md-36 md-dark ms-1 hand-cursor">account_circle</span>
    </div>
    @auth
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><a class="dropdown-item" href="#">Meus pedidos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
    @endauth
    @guest
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
    @endguest
</div>