<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EstruturaDados</title>

  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>

<header class="top-bar" id="topBar">
  <div class="logo-text">EstruturaDados</div>

  <div class="login-area">
  <div class="login-switch">
    <a href="login.php" class="login-option login">Login</a>
    <a href="registrar.php" class="login-option register">Registrar</a>
    <span class="bubble"></span>
  </div>
</div>
</header>

<main class="hero">
  <div class="hero-content">
    <h1>
      Visualizando<br>
      Estruturas<br>
      de Dados
    </h1>

    <div class="logo">
      <img src="../imagens/logo.png" alt="Logo Estrutura de Dados">
    </div>
  </div>

  <div class="explore-area">
    <a href="#conteudo" class="explore-btn">EXPLORAR</a>

    <p class="idealizado-hero">
      <strong>Idealizado por: ANA BEATRIZ SOARES FRAGA, DANIEL CÂMARA ALVES,
      FELIPE ALVES DOS SANTOS, FELIPE GUSTAVO BARBOSA DE ANDRADE</strong>
    </p>
  </div>
</main>



<div class="separator">
  <span></span>
</div>

<section id="conteudo" class="content-section">

  <h1 class="section-title">Quais são as estruturas?</h1>

  <div class="estrutura pilha">
    <div class="texto">
      <h2>Pilha</h2>
      <p>
       A pilha é uma estrutura de dados do tipo LIFO (Last In, First Out), ou seja, o último elemento inserido é o primeiro a ser removido. Suas principais operações são <strong>push</strong>, que insere um elemento no topo, e <strong>pop</strong>, que remove o elemento do topo. Essas operações possuem complexidade O(1), pois atuam apenas na parte superior da estrutura.

      </p>
      <p>
  A pilha é utilizada no controle de chamadas de funções (call stack), no sistema de desfazer e refazer (Ctrl + Z) e na navegação de páginas do navegador. Ela pode ser implementada com vetor ou lista encadeada, onde cada elemento armazena um valor e uma referência para o próximo.
      </p>
    </div>

    <div class="imagem">
      <img src="../imagens/pilha.png" alt="Exemplo de Pilha">
    </div>
  </div>

  <div class="estrutura fila">
    <div class="texto">
      <h2>Fila</h2>
      <p>
        A fila é uma estrutura de dados do tipo FIFO (First In, First Out), ou seja, o primeiro elemento inserido é o primeiro a ser removido. Suas principais operações são <strong>enqueue</strong>, que insere um elemento no final da fila, e <strong>dequeue</strong>, que remove o elemento do início. Assim como na pilha, essas operações possuem complexidade O(1), pois atuam apenas nas extremidades da estrutura.
      </p>
      <p>
        A fila é utilizada em sistemas de atendimento, gerenciamento de processos do sistema operacional e controle de requisições em servidores. Ela pode ser implementada com vetor ou lista encadeada, onde os elementos são organizados respeitando sempre a ordem de chegada.
      </p>
    </div>

    <div class="imagem">
      <img src="../imagens/fila.png" alt="Exemplo de Fila">
    </div>
  </div>

  <div class="estrutura array">
    <div class="texto">
      <h2>Array</h2>
      <p>
      O array é uma estrutura de dados que armazena elementos do mesmo tipo em posições contíguas de memória, permitindo acesso direto por meio de um índice. Isso significa que é possível acessar qualquer elemento de forma rápida utilizando sua posição, com complexidade O(1). No entanto, a inserção ou remoção em posições intermediárias pode exigir deslocamento de elementos      </p>
      <p>
      O array é amplamente utilizado para armazenar coleções de dados de tamanho fixo, como listas de números, caracteres ou objetos. Por possuir tamanho definido no momento da criação, é uma estrutura simples, eficiente e muito utilizada como base para outras estruturas de dados mais complexas.      </p>
    </div>

    <div class="imagem">
      <img src="../imagens/array.png" alt="Exemplo de Array">
    </div>
  </div>

  <div class="estrutura lista-encadeada">
    <div class="imagem">
      <img src="../imagens/lista-encadeada.png" alt="Exemplo de Lista Encadeada">
    </div>

    <div class="texto">
      <h2>Lista Encadeada</h2>
      <p>
        A lista encadeada é uma estrutura de dados formada por nós, onde cada nó armazena um valor e uma referência para o próximo elemento da sequência. Diferente do array, seus elementos não precisam estar em posições contíguas de memória, pois a ligação entre eles é feita por meio de ponteiros. Isso permite inserções e remoções mais flexíveis, especialmente no início ou no meio da estrutura.
      </p>
      <p>
        A lista encadeada é utilizada quando há necessidade de tamanho dinâmico, já que pode crescer ou diminuir conforme a demanda. Ela pode ser simples (aponta apenas para o próximo nó), duplamente encadeada (aponta para o anterior e o próximo) ou circular, sendo muito aplicada na implementação de pilhas, filas e outros tipos de estruturas dinâmicas.      </p>
    </div>
  </div>

  <div class="estrutura lista-circular">
    <div class="texto">
      <h2>Lista Circular</h2>
      <p>
        A fila circular é uma variação da fila tradicional (FIFO) em que o último elemento se conecta novamente ao primeiro, formando um ciclo. Dessa forma, quando o final da estrutura é alcançado, as próximas inserções podem reaproveitar os espaços liberados no início, tornando o uso da memória mais eficiente. Suas principais operações continuam sendo enqueue e dequeue, mantendo complexidade O(1).
      </p>
      <p>
        A fila circular é muito utilizada em sistemas que trabalham com buffers, como controle de impressão, gerenciamento de processos e transmissão de dados. Ela pode ser implementada com vetor, utilizando índices que avançam de forma circular, ou com lista encadeada circular, onde o último nó aponta para o primeiro.      </p>
    </div>

    <div class="imagem">
      <img src="../imagens/lista-circular.png" alt="Exemplo de Lista Circular">
    </div>
  </div>

  <div class="cta-final">
    <p class="cta-text">
      Quer experimentar na prática essas estruturas?
    </p>

    <a href="registrar.php" class="btn-cadastro">
      CADASTRE-SE
    </a>
    
  <p class="cta-login">
    Já tem uma conta?
    <a href="login.php" class="login-link">Entrar</a>
  </p>

  </div>

  <p class="idealizado-final">
    Idealizado por: ANA BEATRIZ SOARES FRAGA, DANIEL CÂMARA ALVES,
    FELIPE ALVES DOS SANTOS, FELIPE GUSTAVO BARBOSA DE ANDRADE
  </p>

</section>

<script>
  let lastScrollTop = 0;
  const header = document.querySelector('.top-bar');

  window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > 100) {
      header.classList.add('hide');
    } else {
      header.classList.remove('hide');
    }

    lastScrollTop = scrollTop;
  });
</script>


</body>
</html>
