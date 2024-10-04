@extends('base')

@section('title', 'Forgot password')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="text-center text-muted mb-3 mt-5">Mot de passe oublié</h1>
            <p class="text-center text-muted mb-5">Veuillez entrer votre adresse e-mail. Nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>

            <form action="{{ route('app_forgotpassword') }}" method="post">
                @csrf

                {{--On inclus les messages d'alert--}}
                @include('alerts.alert-message')

                <label for="email-send" class="form-label">Email</label>
                <input type="email" name="email-send" id="email-send" class="form-control @error('email-success') is-valid @enderror @error('email-error') is-invalid @enderror" placeholder="Veuillez entrer votre adresse e-mail" value="@if(Session::has('old_email')) {{ Session::get('old_email') }} @endif" required>

                <div class="d-grid gap-2 mt-4 mb-5">
                    <button class="btn btn-primary" type="submit">Réinitialiser le mot de passe</button>
                </div>

                <p class="text-center text-muted">Retour à<a href="{{ route('login') }}">se connecter</a></p>
            </form>
        </div>
    </div>
</div>

@endsection
