@extends('layouts.auth')

@section('title', 'Cadastre-se')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center full-vh">
        <div class="mb-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" width="160px" alt="">
            </a>
        </div>
        <div class="w-100 shadow rounded p-4" style="max-width: 450px">
            <form method="POST" action="{{ route('register') }}" id="form">
                @csrf
                <div class="col-12 mb-2">
                    <label class="form-label" for="name">Nome <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
                    @if($errors->get('name'))
                        <div class="text-danger">
                            {{ $errors->get('name')[0] }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="cpf">CPF <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control cpfMask" id="cpf" type="text" name="cpf" required minlength="14" maxlength="14" value="{{ old('cpf') }}">
                    @if($errors->get('cpf'))
                        <div class="text-danger">
                            {{ $errors->get('cpf')[0] }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="email">E-mail <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" required value="{{ old('email') }}">
                    @if($errors->get('email'))
                        <div class="text-danger">
                            {{ $errors->get('email')[0] }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="password">Senha <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" required>
                    @if($errors->get('password'))
                        <div class="text-danger">
                            {{ $errors->get('password')[0] }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label" for="password_confirmation">Confirme sua senha <span class="fw-bold text-danger">*</span></label>
                    <input class="form-control" type="password" name="password_confirmation" required>
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <a href="{{ route('login') }}">Já possui cadastro?</a>
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Cadastrar-se">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#form').on('submit', (e) => {
            $('#cpf').val($('#cpf').val().replace(/[^0-9]/g, ''));
        })
    </script>
@endpush