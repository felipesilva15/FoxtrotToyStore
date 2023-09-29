@extends('layouts.main')

@section('title', 'Perfil de Usuário')

@section('content')
    <section class="my-5 container">
        <div class="my-5 m-auto text-center mb-5">
            <h2>Meu Perfil</h2>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center full-vh">
            <div class="w-100 shadow rounded mb-4 p-4">
                <!-- DIV do Forms de Dados do Usuário-->
                <form method="POST" id="user-form" action="{{ route('profile.update') }}" name="userForm">
                    @csrf
                    {{-- DADOS DO USUÁRIO --}}
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <h3 class="mb-3 card-title fs-4">Dados pessoais</h3>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold" for="nome">Nome <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control" type="text" id="nome" name="USUARIO_NOME"
                                value="{{ Auth::user()->USUARIO_NOME }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold" for="email">Email <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control" type="text" id="email" name="USUARIO_EMAIL"
                                value="{{ Auth::user()->USUARIO_EMAIL }}" required>
                            @if ($errors->get('USUARIO_EMAIL'))
                                <div class="text-danger">
                                    {{ $errors->get('USUARIO_EMAIL')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold" for="senha">Senha <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control" type="password" id="senha" name="USUARIO_SENHA" required>
                            @if ($errors->get('USUARIO_SENHA'))
                                <div class="text-danger">
                                    {{ $errors->get('USUARIO_SENHA')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label fw-bold" for="cpf">CPF <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control cpfMask" type="text" id="cpf" name="USUARIO_CPF"
                                value="{{ Auth::user()->USUARIO_CPF }}">
                        </div>
                        <div class="col-12 mb-2">
                            <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="w-100 shadow rounded mt-4 p-4 mb-4">
                <form method="POST" id="address-form" action="{{ route('profile.address.update') }}" name="addressForm">
                    @csrf
                    {{-- DADOS DO ENDEREÇO DO USUARIO --}}
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <h3 class="mb-3 card-title fs-4">Endereço de entrega</h3>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="form-label fw-bold" for="CEP">CEP <span class="fw-bold text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control rounded-start cepMask" type="text" id="cep" name="endereco_cep" value="{{ $address->ENDERECO_CEP ?? '' }}" maxlength="9" required>
                                <button id="btn-busca-cep" class="btn btn-primary" type="button">
                                    <span class="material-icons d-flex hand-cursor">search</span>
                                </button>
                            </div>
                            @if ($errors->get('endereco_cep'))
                                <div class="text-danger">
                                    {{ $errors->get('endereco_cep')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column col-8 mb-3">
                            <label class="form-label fw-bold" for="TipoEndereco">Tipo de Endereço <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" id="tipo" name="endereco_nome" value="{{ $address->ENDERECO_NOME ?? '' }}" required>
                                <option>-- Selecione --</option>
                                <option value="Casa" {{ $address->ENDERECO_NOME ?? '' == 'Casa' ? 'selected' : '' }}>Casa</option>
                                <option value="Apartamento" {{ $address->ENDERECO_NOME ?? '' == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                                <option value="Trabalho" {{ $address->ENDERECO_NOME ?? '' == 'Trabalho' ? 'selected' : '' }}>Trabalho</option>
                                <option value="Outro" {{ $address->ENDERECO_NOME ?? '' == 'Outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                            @if ($errors->get('endereco_nome'))
                                <div class="text-danger">
                                    {{ $errors->get('endereco_nome')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="col-9 mb-3">
                            <label class="form-label fw-bold" for="logradouro">Logradouro <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control bg-body-secondary" type="text" id="logradouro" name="endereco_logradouro" value="{{ $address->ENDERECO_LOGRADOURO ?? '' }}" required readonly>
                            @if ($errors->get('endereco_logradouro'))
                                <div class="text-danger">
                                    {{ $errors->get('endereco_logradouro')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column col-3 mb-3">
                            <label class="form-label fw-bold" for="numero">Nº <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control" type="text" id="numero" name="endereco_numero" value="{{ $address->ENDERECO_NUMERO ?? '' }}" required>
                            @if ($errors->get('endereco_numero'))
                                <div class="text-danger">
                                    {{ $errors->get('endereco_numero')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column col-6 mb-3">
                            <label class="form-label fw-bold" for="TipoEndereco">Complemento</label>
                            <input class="form-control" type="text" id="complemento" name="ENDERECO_COMPLEMENTO" value="{{ $address->ENDERECO_COMPLEMENTO ?? '' }}">
                        </div>
                        <div class="d-flex flex-column col-4 mb-3">
                            <label class="form-label fw-bold" for="Cidade">Cidade <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control bg-body-secondary" type="text" id="cidade" name="endereco_cidade" value="{{ $address->ENDERECO_CIDADE ?? '' }}" required readonly>
                            @if ($errors->get('endereco_cidade'))
                                <div class="text-danger">
                                    {{ $errors->get('endereco_cidade')[0] }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column col-2 mb-3">
                            <label class="form-label fw-bold" for="Estado">Estado <span class="fw-bold text-danger">*</span></label>
                            <input class="form-control bg-body-secondary" type="text" id="estado" name="endereco_estado" value="{{ $address->ENDERECO_ESTADO ?? '' }}" required readonly>
                        </div>
                        <div>
                            @if (!$address)
                                <button class="btn btn-primary float-end" type="submit">Cadastrar</button>
                            @else
                                <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                            @endif
                        </div>
                    </div>
                </form>
                <div>
                    @if (!$address)
                    @else
                        <form action="{{ route('profile.address.destroy') }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger float-end mt-2" type="submit">Excluir</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/profile-edit.js') }}"></script>
@endpush
