<div>
    <p>
        Olá <strong>{{ $user->name }}</strong>, tudo bem?
        <br><br>
        Sua inscrição no evento <strong>{{ $event->title }}</strong> foi realizada com sucesso!
        <br>
        Muito obrigado por sua inscrição!
    </p>
    <hr>
    E-mail enviado em {{ date('d/M/Y H:i:s')}} por Event Sistema.
</div>
