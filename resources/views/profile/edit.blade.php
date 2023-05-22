@extends('layouts.auth')

@section('title', 'Perfil de Usuário')

@section('content')

<section class="container">
    <div class="d-flex flex-column justify-content-center align-items-center full-vh">
        <div class="mb-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" width="160px" alt="">
            </a>
        </div>
        <div class="my-5 m-auto text-center mb-5">
            <h2>Meu Perfil</h2>
        </div>
        <div class="w-100 shadow rounded mb-4 p-4">
            <form method="POST" action="{{ route('profile.update') }}" name="userForm">
                @csrf
                {{-- DADOS DA TABELA DE USUÁRIO --}}
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <h3 class="mb-3 card-title fs-4">Dados do Usuário</h3>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold" for="nome">Nome <span class="fw-bold text-danger">*</span></label>
                        <input class="form-control" type="text" id="nome" name="USUARIO_NOME" value="{{ Auth::user()->USUARIO_NOME }}" placeholder="Seu nome" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold" for="email">Email <span class="fw-bold text-danger">*</span></label>
                        <input class="form-control" type="text" id="email" name="USUARIO_EMAIL" value="{{ Auth::user()->USUARIO_EMAIL }}" placeholder="Seu endereço de e-mail" required>
                        @if ($errors->get('USUARIO_EMAIL'))
                            <div class="text-danger">
                                {{$errors->get('USUARIO_EMAIL')[0]}}
                            </div>
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold" for="senha">Senha <span class="fw-bold text-danger">*</span></label>
                        <input class="form-control" type="password" id="senha" name="USUARIO_SENHA" placeholder="Sua senha" required>
                        @if ($errors->get('USUARIO_SENHA'))
                            <div class="text-danger">
                                {{$errors->get('USUARIO_SENHA')[0]}}
                            </div>
                        @endif
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-label fw-bold" for="cpf">CPF <span class="fw-bold text-danger">*</span></label>
                        <input class="form-control cpfMask" type="text" id="cpf" name="USUARIO_CPF" value="{{ Auth::user()->USUARIO_CPF }}" placeholder="Seu CPF">
                    </div>
                    <div class="col-12 mb-2">
                        <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        {{-- DADOS DA TABELA DE ENDEREÇO DO USUARIO --}}
    <div class="w-100 shadow rounded mt-4 p-4 mb-4">
        {{-- {{ route('profile.update') }} --}}
        <form method="POST" action="{{ route('profile.address.update') }}" name="addressForm">
            @csrf
            <div class="row">
                @if ($address)
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <h3 class="mb-3 card-title fs-4">Atualize seu Endereço</h3>
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <h3 class="mb-3 card-title fs-4">Cadastre seu Endereço</h3>
                    </div>
                @endif
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label fw-bold cepMask" for="CEP">CEP <span class="fw-bold text-danger">*</span></label>
                    <div class="input-group">
                        <input class="form-control rounded-start" type="text" id="cep" name="ENDERECO_CEP" value="{{ Auth::user()->ENDERECO_CEP }}" placeholder="Digite o seu CEP" maxlength="8" required onblur="consultaCep(this.value)">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    @if ($errors->get('ENDERECO_CEP'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_CEP')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-8 mb-3">
                    <label class="form-label fw-bold" for="TipoEndereco">Tipo de Endereço<span class="fw-bold text-danger">*</span></label>
                    <select class="form-select" id="tipo" name="ENDERECO_NOME" required>
                        <option value="">Selecione</option>
                        <option value="Casa" {{ Auth::user()->ENDERECO_NOME == 'Casa' ? 'selected' : '' }}>Casa</option>
                        <option value="Apartamento" {{ Auth::user()->ENDERECO_NOME == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                        <option value="Trabalho" {{ Auth::user()->ENDERECO_NOME == 'Trabalho' ? 'selected' : '' }}>Trabalho</option>
                        <option value="Outro" {{ Auth::user()->ENDERECO_NOME == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @if ($errors->get('ENDERECO_NOME'))
                        <div class="text-danger">
                            {{$errors->get('ENDERECO_NOME')[0]}}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold text-secondary" for="logradouro">Rua<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="logradouro" name="ENDERECO_LOGRADOURO" value="{{ Auth::user()->ENDERECO_LOGRADOURO }}" placeholder="" required disabled>
                    @if ($errors->get('endereco_logradouro'))
                        <div class="text-danger">
                            {{$errors->get('endereco_logradouro')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-4 mb-3">
                    <label class="form-label fw-bold" for="numero">Nº<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="numero" name="ENDERECO_NUMERO" placeholder="" required>
                    @if ($errors->get('endereco_numero'))
                        <div class="text-danger">
                            {{$errors->get('endereco_numero')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-8 mb-3">
                    <label class="form-label fw-bold" for="TipoEndereco">Complemento<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="tipo" name="ENDERECO_COMPLEMENTO" placeholder="" required>
                </div>
                <div class="d-flex flex-column col-8 mb-3">
                    <label class="form-label fw-bold text-secondary" for="Cidade">Cidade<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="cidade" name="ENDERECO_CIDADE" placeholder="" required disabled>
                    @if ($errors->get('endereco_cidade'))
                        <div class="text-danger">
                            {{$errors->get('endereco_cidade')[0]}}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column col-4 mb-3">
                    <label class="form-label fw-bold text-secondary" for="Estado">Estado<span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" id="estado" name="endereco_estado" placeholder="" required disabled>
                </div>
                <div>
                    @if (empty($address) || !$address->active)
                    <button class="btn btn-primary float-end" type="submit">Cadastrar</button>
                @else
                    <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                    <button class="btn btn-danger float-end me-2" type="submit">Excluir</button>
                @endif
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
    <script src="js/viaCep.js"></script>
    <script src="js/utils.js"></script>
    <script>
        $('#form').on('submit', (e) => {
            $('#cpf').val($('#cpf').val().replace(/[^0-9]/g, ''));
        })
    </script>
@endpush
