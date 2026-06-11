<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
</head>
<body>
    <main>
        <h1>Recuperar Senha</h1>
        <p>Digite seu e-mail para receber as instruções de recuperação de senha.</p>
        <form action="backend/recuperar-senha.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>