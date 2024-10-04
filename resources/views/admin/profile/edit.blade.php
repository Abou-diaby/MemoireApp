@extends('base')

@section('title', 'Modifier le profil admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Modifier le profil admin</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
            <br>
                <!-- Bouton Retour -->
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
