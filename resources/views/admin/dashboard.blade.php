@extends('base')

@section('title', 'admin.dashboard')

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
                <a class="nav-link" href="{{ url('/admin/profile') }}"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
            </li>
        </ul>
    </div>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Etudiant</th>
                    <th>Session</th>
                    <th>Thème</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demands as $demand)
                    <tr>
                        <td>{{ $demand->user->name }}</td>
                        <td>{{ $demand->session }}</td>
                        <td>{{ $demand->theme }}</td>
                        <td>{{ $demand->response ?? 'En attente' }}</td>
                        <td>
                            <button class="btn btn-info" onclick="window.location.href='{{ url('/admin/demands/' . $demand->id) }}'">Voir</button>
                            @if($demand->response === 'En attente')
                                <form action="{{ route('admin.dashboard.accept', $demand->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accepter</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $demand->id }}">Rejeter</button>
                            @endif
                        </td>
                    </tr>

                    <!-- pour rejet de la demande -->
                    <div class="modal fade" id="rejectModal{{ $demand->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $demand->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rejectModalLabel{{ $demand->id }}">Rejeter la demande</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.dashboard.reject', $demand->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="remarks{{ $demand->id }}" class="form-label">Remarques</label>
                                            <textarea class="form-control" id="remarks{{ $demand->id }}" name="remarks" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-danger">Rejeter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
