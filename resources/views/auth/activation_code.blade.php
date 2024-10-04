@extends('base')

@section('title', 'Account activation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">Activation de compte</h1>

                {{--On inclus les messages d'alert--}}
                @include('alerts.alert-message')

                <form method="POST" action="{{ route('app_activation_code',['token' => $token]) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="activation-code" class="form-label">Activation du Code</label>
                        <input type="text" class="form-control @if(Session::has('danger')) is-invalid @endif" name="activation-code" id="activation-code" value="@if(Session::has('activation_code')){{ Session::get('activation_code') }}@endif" required>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ route('app_activation_account_change_email', ['token' => $token]) }}">Change ton adresse e-mail</a>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('app_resend_activation_code', ['token' => $token]) }}">Renvoyer le code d'activation</a>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Activer</button>
                    </div>

                </form>
            </div>

        </div>



    </div>

@endsection
