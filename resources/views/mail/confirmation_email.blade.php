<h1>Salut {{ $name }} Veuillez confirmer votre email!</h1>

<p>
    Veuillez activer votre compte en copiant et collant le code d'activation.
    <br>Code d'activation : {{ $activation_code }}.<br>
    Ou en cliquant sur le lien suivant : <br>
    <a href="{{ route('app_activation_account_link',['token' => $activation_token]) }}" target="_blank">Confirmez votre compte</a>
</p>

<p>L'équipe MonMemoire.</p>
