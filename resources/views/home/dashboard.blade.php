@extends('base')

@section('title', 'Dashboard')

@section('content')
<style>
    .sidebar {
            background-color: #F5E050;
            padding: 20px;
            width: 250px;
        }

        .sidebar h3 {
            color: #000000;
        }

        .sidebar .nav-link {
            color: #000000;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }
</style>
<div class="d-flex">
    <!-- Barre latérale -->
    <div class="sidebar" style="width: 250px;" id="sidebar">
    <h5><i class="fa fa-bars" aria-hidden="true"></i></i> Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"aria-hidden="true"></i>Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
            </li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="container mt-4">
        <!-- Bouton pour faire une demande -->
        <div class="text-center mb-3">
            <button class="btn btn-primary" onclick="window.location.href='{{ url('/demands/new') }}'">Faire une demande</button>
        </div>

        <!-- Tableau des demandes -->


                @if (isset($demands) && $demands->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date de la Demande</th>
                                <th>Session de Soutenance</th>
                                <th>Thème</th>
                                <th>Réponse</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demands as $demand)
                                <tr>
                                    <td>{{ $demand->date }}</td>
                                    <td>{{ $demand->session }}</td>
                                    <td>{{ $demand->theme }}</td>
                                    <td>{{ $demand->response ?? 'En attente' }}</td>
                                    <td>
                                    <button class="btn btn-info" onclick="window.location.href='{{ url('/demands/' . $demand->id) }}'">Voir</button>
                                    </td>
                                    <td>
                                    <!-- Bouton de suppression -->
                                    <form action="{{ url('/demands/' . $demand->id) }}" method="post" style="display:inline;">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">Supprimer</button>
                                     </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Aucune demande trouvée.</p>
                @endif
    </div>
</div>

@endsection
