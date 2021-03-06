@extends('layouts.app')

@section('content')


<div class="hold-transition login-page portada">
    <div class="login-box">
        <div class="login-logo mb-3">
            <!-- <p>Life in Genomics</p> -->
            {{-- <img src="{{ asset('img/logo_life_in_genomics.png')}}" alt="Life in Genomics" width="250"> --}}
        </div>
        <div class="card card-outline card-primary mt-4">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar sesión</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary cold-md-2 bg-boton"><i class="fas fa-sign-out-alt"></i> Iniciar sesión</button>
                    </div>
                </form>
                <div class="row">
                    <small id="emailHelp" class="form-text text-muted">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link text-boton" href="{{ route('password.request') }}">
                            {{ __('¡Olvide mi contraseña!') }}
                        </a>
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
