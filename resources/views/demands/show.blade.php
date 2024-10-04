@extends('base')

@section('title', 'show')

@section('content')

<div class="container mt-4">
    <h2>Détails de la Demande</h2>
    <form action="{{ url('/demands/' . $demand->id) }}" method="post">
        @csrf
        @method('PUT') <!-- Méthode PUT pour mettre à jour -->

        <!-- Informations personnelles -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" value="{{ $demand->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Prénom</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $demand->lastname }}" required>
                </div>
            </div>
        </div>

        <!-- Informations académiques -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $demand->email }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="tel" class="form-control" name="tel" value="{{ $demand->tel }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="te" class="form-control" name="matricule" value="{{ $demand->matricule }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="class">Classe</label>
                    <input type="text" class="form-control" name="class" value="{{ $demand->class }}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="parcours">Parcours</label>
            <input type="text" class="form-control" name="parcours" value="{{ $demand->parcours }}" required>
        </div>
        <div class="form-group">
            <label for="session">Session</label>
            <input type="text" class="form-control" name="session" value="{{ $demand->session }}" required>
        </div>

        <!-- Détails du mémoire -->
        <div class="form-group">
            <label for="theme">Thème</label>
            <input type="text" class="form-control" name="theme" value="{{ $demand->theme }}" required>
        </div>

        <div class="form-group">
            <label for="problematique">Problématique</label>
            <textarea class="form-control" name="problematique" rows="5">{{ $demand->problematique }}</textarea>
        </div>
        <div class="form-group">
            <label for="objectif_general">Objectif général</label>
            <textarea class="form-control" name="objectif_general" rows="5">{{ $demand->objectif_general }}</textarea>
        </div>
        <div class="form-group">
            <label for="objectifs_specifiques">Objectifs spécifiques</label>
            <textarea class="form-control" name="objectifs_specifiques" rows="5">{{ $demand->objectifs_specifiques }}</textarea>
        </div>
        <div class="form-group">
            <label for="resultats_attendus">Resultats attendus</label>
            <textarea class="form-control" name="resultats_attendus" rows="8">{{ $demand->resultats_attendus }}</textarea>
        </div>
        <div class="form-group">
        <label for="remarks">Remarques</label>
        <textarea class="form-control" name="remarks" rows="8" readonly>{{ $demand->remarks }}</textarea>
        </div>
        <br>
        <!-- Bouton Retour -->
        <a href="{{ route('app_dashboard') }}" class="btn btn-secondary">Retour</a>
        <!-- Bouton de mise à jour -->
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
