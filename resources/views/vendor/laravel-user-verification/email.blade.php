<h4>Olá,</h4>
<p> Sua conta SmartEnem foi criada</p>
<p>
    Clique
    <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">
        Aqui
    </a>
    para confirmar a sua conta.
</p>
<p>Obs.: Não responda este email, ele é gerado automaticamente</p>

<p>Atenciosamente,</p>
<h5>{{ config('app.name') }}</h5>