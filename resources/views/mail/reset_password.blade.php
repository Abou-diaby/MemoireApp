<h1>Salut {{ $name }} Veuillez réinitialiser votre mot de passe</h1>

<p>
    Nous avons reçu une demande de modification de votre mot de passe.
    Si vous n'êtes pas initiateur de cette demande, merci de nous le faire savoir pour la sécurité de votre compte.
    <br>Si vous êtes l'initiateur, cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe<br>
    <a href="{{ route('app_changepassword', ['token' => $activation_token]) }}" target="_blank">Réinitialiser le mot de passe</a>
</p>

<p>L'équipe MonMemoire.</p>
