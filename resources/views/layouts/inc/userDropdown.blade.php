<div class="dropstart d-inline">
    <div class="dropdown d-inline" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-offset="15,15">
        <span class="material-icons md-36 md-dark ms-1 hand-cursor">account_circle</span>
    </div>
    @auth
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route ('profile.edit') }}">Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('order') }}">Meus pedidos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('post')
                    <input class="dropdown-item" type="submit" value="Logout">
                </form>
            </li>
        </ul>
    @endauth
    @guest
        <form method="POST" action="{{ route('login') }}" class="dropdown-menu p-4" style="width: 320px">
            @csrf
            <h3 class="text-center mb-3">Login</h3>
            <div class="mb-2">
                <label for="login-email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="login-email" name="email" required>
            </div>
            <div class="mb-2">
                <label for="login-password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="login-password" name="password" required minlength="3">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <a href="{{ route('register') }}">Não possui cadastro?</a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    @endguest
</div>
