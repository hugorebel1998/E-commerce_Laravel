@extends('layouts.app')

@section('content')

<div class="hold-transition login-page portada">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <div class="card mt-4">

            <div class="card-body login-card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="form-group">

                                <button type="submit" class="btn btn-sm btn-primary btn-block rounded-pill bg-boton">
                                    <i class="fas fa-envelope-square"></i> Enviar link de confirmación
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <small id="emailHelp" class="form-text text-muted">
                        <a class="btn btn-link text-boton" href="{{ route('login') }}">
                            {{ __('Iniciar sesión') }}
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
