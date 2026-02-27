<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista Encadeada</title>
  <link rel="stylesheet" href="../CSS/conteudo.css">
  <link rel="stylesheet" href="../CSS/lista.css">
</head>
<body>

<header class="top-bar">
  <a href="tela-inicial.php" class="logo-text">EstruturaDados</a>
  <div class="login-area">
    <img src="../imagens/user.png">
    <span>Usuario</span>
  </div>
</header>

<main class="container">

  <nav class="side-navbar">
    <h1>Listas</h1>
    <a href="pilha.php" class="menu-item"><span class="circle">1</span><span>Pilha</span></a>
    <a href="fila.php" class="menu-item"><span class="circle">2</span><span>Fila</span></a>
    <a href="array.php" class="menu-item"><span class="circle">3</span><span>Array</span></a>
    <a href="listas.php" class="menu-item active"><span class="circle">4</span><span>Listas</span></a>
  </nav>

  <div class="vertical-line">
    <div class="cross-dot"></div>
  </div>

  <section class="content">

    <div class="tabs-container">
      <div class="horizontal-line">
        <div class="left-dot"></div>
        <div class="right-dot"></div>
      </div>

      <div class="tabs">
        <a href="listas.php" class="tab active-tab">Encadeada</a>
        <a href="lista-sequencial.php" class="tab">Sequencial</a>
        <a href="lista-dinamica.php" class="tab">Dinâmica</a>
        <a href="lista-circular.php" class="tab">Circular</a>
      </div>
    </div>

    <section class="content">
    <h2 class="titulo">Lista Encadeada Simples</h2>
    <p class="descricao">Cada nó aponta para o próximo através do ponteiro next.</p>

    <!-- TABS DE MODALIDADE -->
    <div class="modalidade-tabs">
      <button class="tab-btn active" onclick="trocarModalidade('inicio', this)">Inserção Início</button>
      <button class="tab-btn" onclick="trocarModalidade('fim', this)">Inserção Fim</button>
      <button class="tab-btn" onclick="trocarModalidade('ordenada', this)">Inserção Ordenada</button>
    </div>

    <div class="titulo-modalidade" id="titulo-modalidade">
      Lista Encadeada ( Inserção Início )
    </div>

    <!-- CONTROLES -->
    <div class="painel-controle">
      <div class="grupo">
        <label>Valor</label>
        <input type="number" id="valor" placeholder="Digite o valor">
      </div>
      <div class="grupo botoes">
        <button onclick="inserir()" class="btn inserir">Inserir</button>
        <button onclick="removerInicio()" class="btn remover">Remover Início</button>
        <button onclick="removerFinal()" class="btn remover">Remover Final</button>
        <button onclick="buscar()" class="btn buscar">Buscar</button>
        <button onclick="reiniciar()" class="btn reiniciar">Reiniciar</button>
      </div>
    </div>

    <!-- ÁREA PRINCIPAL: visualização + memória -->
    <div class="area-principal">

      <!-- VISUALIZAÇÃO -->
      <div class="area-visual">
        <div id="lista" class="lista"></div>
      </div>

      <!-- TABELA DE MEMÓRIA -->
      <div class="area-memoria">
        <table id="tabela-memoria" class="tabela-memoria">
          <thead>
            <tr>
              <th>INFORMAÇÃO</th>
              <th>MEMÓRIA</th>
              <th>CONTEÚDO</th>
            </tr>
          </thead>
          <tbody>
            <!-- preenchido pelo JS -->
          </tbody>
        </table>
      </div>

    </div><!-- fim area-principal -->

  </section>
</main>

<script src="../JS/lista.js"></script>
</body>
</html>