<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Esqueci a Senha</title>
<head>
<link rel="stylesheet" href="../CSS/esquecer_senha.css">
</head>
<body>
    <div class="card">
    <h2>Recuperar Senha</h2>

    <form action="../PHP/enviar_token.php" method="POST">
        <input type="email" name="email" placeholder="Digite seu e-mail" required>
        <button type="submit" name="salvar">Enviar</button>
    </form>

    <a href="login.php">Voltar para login</a>
</body>

</html>