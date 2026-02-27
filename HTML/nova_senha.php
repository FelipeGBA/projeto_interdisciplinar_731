<?php
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Nova Senha</title>
<head>
<link rel="stylesheet" href="../CSS/nova_senha.css">
</head>
<body>
    <div class="card">
    <h2>Redefinir Senha</h2>

    <form action="../PHP/redefinir_senha.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">            
        <input type="password" name="senha" placeholder="Nova senha" required>
        <input type="password" name="confirmar_senha" placeholder="Confirmar senha" required>

        <button type="submit" name="salvar">Salvar Nova Senha</button>
    </form>
</div>

</body>
</html>