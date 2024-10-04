@extends('base')

@section('title', 'Change your email address')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="text-center text-muted mb-3 mt-5">Change ton adresse e-mail</h2>

                {{--On inclus les messages d'alert--}}
                @include('alerts.alert-message')

                <form action="{{ route('app_activation_account_change_email', ['token' => $token]) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="new-email" class="form-label">Nouvelle adresse e-mail</label>
                        <input type="email" class="form-control @if(Session::has('danger')) is-invalid @endif" name="new-email" id="new-email" value="@if(Session::has('new_email')){{ Session::get('new_email') }}@endif" placeholder="Entrez la nouvelle adresse e-mail" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Changer</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
