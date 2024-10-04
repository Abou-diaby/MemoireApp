@extends('base')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="jumbotron text-center bg-light py-5 mt-5 animate__animated animate__fadeInUp">
        <h1 class="display-4">Bienvenue</h1>
        <p class="lead">Faites votre demande en toute liberté.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Se connecter</a>
        <a class="btn btn-secondary btn-lg" href="{{ route('register') }}" role="button">S'inscrire</a>
    </div>
</div>
@endsection
