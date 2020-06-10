@extends('layouts.authentication')

@section('content')
<div class="login-logo">
    <a href="#!">{{ config('app.name', 'Laravel') }}</a>
</div>

<div class="card">
    <div class="card-body login-card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p class="login-box-msg">Avez vous oubliez votre mot de passe? Vous pouvez en récupérer un nouveau ici.</p>

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input id="email" type="email" placeholder="{{ _('Adresse Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
            <div class="row">
                <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">{{ _('Demander un nouveau mot de passe') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">{{ _('Se conneter') }}</a>
        </p>
        <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">{{ _('Créer un nouveau compte') }}</a>
        </p>
    </div>
</div>
@endsection
