<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body class="auth-page">

  <div class="register-card fade-in login-card">

    <h1>Login</h1>
    <img src="../imagens/logo.png" alt="Logo" class="auth-logo">

    <form class="register-form" method="POST" action="../PHP/logar.php">

      <label>Endereço de e-mail</label>
      <input type="email" name="email" placeholder="Digite seu e-mail" required>

      <label>Senha</label>
      <input type="password" name="senha" placeholder="Digite sua senha" required minlength="6">

      <button type="submit" class="btn-login" name="salvar">Entrar</button>

      <a href="esqueceu_senha.php" class="forgot-password">Esqueceu a senha?</a>

    </form>

    <a href="registrar.php" class="btn-register-outline">Registrar</a>

    <a href="tela-inicial.php" class="btn-back-home">Voltar para o início</a>

  </div>

  <footer class="credits">
    Idealizado por: ANA BEATRIZ SOARES FRAGA, DANIEL CÂMARA ALVES,
    FELIPE ALVES DOS SANTOS, FELIPE GUSTAVO BARBOSA DE ANDRADE
  </footer>

</body>
</html>