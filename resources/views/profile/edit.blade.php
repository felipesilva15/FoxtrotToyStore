@extends('layouts.main')

@section('title', 'Perfil de Usuário')

@section('content')

{{-- Div para a logo  --}}
{{-- <div class="d-flex flex-column justify-content-center align-items-center full-vh">
    <div class="mb-3">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" width="160px" alt="">
        </a>
</div> --}}
<section class="container">
    <div class="w-100 shadow rounded mb-4 p-4">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            {{-- DADOS DA TABELA DE USUÁRIO --}}
            <div class="row">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <h3 class="mb-3 card-title fs-4">Dados do Usuário</h5>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="nome">Nome: <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="nome" name="USUARIO_NOME" value="{{ Auth::user()->USUARIO_NOME }}" placeholder="Seu nome" required>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="email">Email: <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="email" name="usuario_email" value="{{ Auth::user()->usuario_email }}" placeholder="Seu endereço de e-mail" required>
                    @if ($errors->get('usuario_email'))
                        <div class="text-danger">
                            {{$errors->get('usuario_email')[0]}}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="senha">Senha: <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="password" id="senha" name="usuario_senha" placeholder="Sua senha" required>
                    @if ($errors->get('usuario_senha'))
                        <div class="text-danger">
                            {{$errors->get('usuario_senha')[0]}}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="cpf">CPF: </label>
                    <input class="form-control" type="text" id="cpf" name="USUARIO_CPF" value="{{ Auth::user()->USUARIO_CPF }}" placeholder="Seu CPF">
                </div>
                <div class="col-12 mb-2">
                    <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
            {{-- DADOS DA TABELA DE ENDEREÇO DO USUARIO --}}
    <div class="w-100 shadow rounded mt-4 p-4 mb-4">
        {{-- {{ route('product') }} --}}
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <h3 class="mb-3 card-title fs-4">Cadastre seu Endereço</h5>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label" for="CEP">CEP: <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="cep" name="ENDERECO_CEP" placeholder="" maxlength="8" required onblur="consultaCep(this.value)">
                    @if ($errors->get('ENDERECO_CEP'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_CEP')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-8 mb-2">
                    <label class="form-label" for="TipoEndereco">Tipo de Endereço:<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="tipo" name="ENDERECO_NOME" placeholder="Ex: Casa, Apto, Escritório, etc..." required>
                    @if ($errors->get('ENDERECO_NOME'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_NOME')[0]}}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="logradouro">Rua<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="logradouro" name="ENDERECO_LOGRADOURO" placeholder="" required>
                    @if ($errors->get('ENDERECO_LOGRADOURO'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_LOGRADOURO')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-4 mb-2">
                    <label class="form-label" for="numero">Nº<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="numero" name="ENDERECO_NUMERO" placeholder="" required>
                    @if ($errors->get('ENDERECO_NUMERO'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_NUMERO')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-8 mb-2">
                    <label class="form-label" for="TipoEndereco">Complemento:<span class="fw-bold text-danger"></span></label>
                    <input class="form-control" type="text" id="tipo" name="ENDERECO_COMPLEMENTO" placeholder="" required>
                </div>
                <div class="d-flex flex-column col-8 mb-2">
                    <label class="form-label" for="Cidade">Cidade:<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="cidade" name="ENDERECO_CIDADE" placeholder="Ex: Belo Horizonte" required>
                    @if ($errors->get('ENDERECO_CIDADE'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_CIDADE')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-4 mb-2">
                    <label class="form-label" for="Estado">Estado:<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="estado" name="ENDERECO_ESTADO" placeholder="Ex: MG" required>
                </div>
                <div>
                    <input class="btn btn-primary float-end" type="submit" value="Salvar">
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
    <script src="js/viaCep.js"></script>
@endpush
