@extends('layouts.authentication')

@section('content')
<div class="register-logo"><a href="#!">{{ config('app.name', 'Laravel') }}</a></div>

<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Créer un nouveau compte</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input  id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="{{ _('Nom') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input  id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="last_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="{{ _('Prénom(s)') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input  id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo" placeholder="{{ _('Pseudo') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('pseudo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Adresse E-Mail') }}">

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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ _('Mot de passe') }}">

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

            <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ _('Confirmez le mot de passe') }}">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <!-- <div class="icheck-primary">
                        <input type="checkbox" id="manager" name="manager" value="agree">
                        <label for="manager">
                            {{ _('Register as a Manager') }}
                        </label>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-block">{{ _("S'enregistrer") }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-0">
            <a href="{{ route('login') }}" class="text-center">{{ _("J'ai déjà un compte") }}</a>
        </p>
    </div>
</div>
@endsection
