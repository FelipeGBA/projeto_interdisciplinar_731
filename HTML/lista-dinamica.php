<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista Dinâmica</title>
  <link rel="stylesheet" href="../CSS/conteudo.css">
</head>

<body>

<header class="top-bar">
  <a href="tela-inicial.php" class="logo-text">EstruturaDados</a>
  <div class="login-area">
    <img src="../imagens/user.png" alt="Usuário">
    <span>Usuário</span>
  </div>
</header>

<main class="container">

  <nav class="side-navbar">
    <h1>Listas</h1>
    <a href="pilha.php" class="menu-item">
      <span class="circle">1</span><span>Pilha</span>
    </a>
    <a href="fila.php" class="menu-item">
      <span class="circle">2</span><span>Fila</span>
    </a>
    <a href="array.php" class="menu-item">
      <span class="circle">3</span><span>Array</span>
    </a>
    <a href="listas.php" class="menu-item active">
      <span class="circle">4</span><span>Listas</span>
    </a>
  </nav>

  <div class="vertical-line"></div>

  <section class="content">

    <div class="tabs-container">
      <div class="horizontal-line">
        <div class="left-dot"></div>
        <div class="right-dot"></div>
      </div>

      <div class="tabs">
        <a href="listas.php" class="tab">Encadeada</a>
        <a href="lista-sequencial.php" class="tab">Sequencial</a>
        <a href="lista-dinamica.php" class="tab active-tab">Dinâmica</a>
        <a href="lista-circular.php" class="tab">Circular</a>
      </div>
    </div>

    <h2 class="tab-title">Lista Dinâmica</h2>

    <div class="form-area">

      <div class="form-group">
        <div class="input-row">

          <div class="input-column">
            <label>Adicione um valor:</label>
            <input type="text" placeholder="Digite o valor">
          </div>

          <div class="input-column">
            <label>Insira a posição:</label>
            <input type="text" placeholder="Digite a posição">
          </div>

          <div class="input-column-btn">
            <button class="btn">Inserir</button>
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="input-row">

          <div class="input-column">
            <label>Buscar valor:</label>
            <input type="text" placeholder="Digite o valor para buscar">
          </div>

          <div class="input-column-btn">
            <button class="btn">Buscar</button>
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="input-row">

          <div class="input-column">
            <label>Remover valor:</label>
            <input type="text" placeholder="Digite o valor para remover">
          </div>

          <div class="input-column-btn">
            <button class="btn">Remover</button>
          </div>

        </div>
      </div>

    </div>

    <h2>Resultado</h2>
    <div class="result-box">
    </div>

  </section>
</main>

</body>
</html>