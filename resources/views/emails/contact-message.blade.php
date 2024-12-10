<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem de Contato</title>
</head>
<body>
    <h1>Nova Mensagem de Contato</h1>
    <p><strong>Nome:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Telefone:</strong> {{ $phone }}</p>
    <p><strong>Cidade:</strong> {{ $city }}</p>
    <p><strong>Loja:</strong> {{ $storeName }}</p>
    <p><strong>Assunto:</strong> {{ $subject }}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{ $messageContent }}</p>
</body>
</html>
