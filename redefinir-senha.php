<?php

$token = $_GET['token'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
</head>
<body>
<main>
    <h1>nova senha</h1>
    <form action="backend/nova-senha.php?token=<?php echo $token; ?>" method="POST">
        <label for="senha">Digite sua nova senha:</label>
        <input type="password" id="senha" name="senha" required>
        <label for="confirmar_senha">Confirme sua nova senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required>
        <button type="submit">Alterar Senha</button>
    </form>
</main>

</body>
</html>