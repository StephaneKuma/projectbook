@extends('layouts.authentication')

@section('content')
<div class="login-logo">
    <a href="#!">{{ config('app.name', 'Laravel') }}</a>
</div>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Connectez-vous pour démarer votre session</p>

        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
              <input  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Adresse E-Mail') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="{{ _('Mot de passe') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-7">
                <div class="icheck-primary">
                  <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">
                    {{ __('Se souvenir de moi') }}
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-5">
                <button type="submit" class="btn btn-primary btn-block">{{ _('Se connecter') }}</button>
              </div>
              <!-- /.col -->
            </div>
        </form>

        @if (Route::has('password.request'))
            <p class="mt-3 mb-1">
                <a href="{{ route('password.request') }}">{{ _("J'ai oublié mon mot de passe") }}</a>
            </p>
        @endif

        <p class="mt-3 mb-0">
            <a href="{{ route('register') }}" class="text-center">{{ _('Créer un nouveau compte') }}</a>
        </p>
    </div>
</div>
@endsection
