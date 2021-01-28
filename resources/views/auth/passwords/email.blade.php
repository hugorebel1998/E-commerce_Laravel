@extends('layouts.app')

@section('content')
<style>

.portada{
   background: url( {{asset('img/FONDO_REGISTRO.jpg')}} ) no-repeat fixed center;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
}

    .bg-boton{
        background-color: #213A8A;
    }
    .text-boton{
        color: #213A8A;
    }
</style>

<div class="hold-transition login-page portada">
    <div class="login-box">
        <div class="login-logo">
        <img src="{{ asset('img/logo_life_in_genomics.png')}}" alt="Life in Genomics" width="250">

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
