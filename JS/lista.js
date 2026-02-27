// =============================================
//   LISTA ENCADEADA — lista.js
//   Modalidades: início, fim, ordenada
//   + Tabela de memória simulada
// =============================================

let lista = [];
let modalidade = 'inicio';
let mensagemTimer = null;

// Simula endereços de memória
function gerarEndereco() {
  return '0x' + Math.floor(Math.random() * 0xFFFF).toString(16).toUpperCase().padStart(4, '0');
}

// ---------- Modalidade ----------

function trocarModalidade(modo, btnEl) {
  modalidade = modo;
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  btnEl.classList.add('active');

  const titulos = {
    inicio:   'Lista Encadeada ( Inserção Início )',
    fim:      'Lista Encadeada ( Inserção Fim )',
    ordenada: 'Lista Encadeada ( Inserção Ordenada )'
  };
  document.getElementById('titulo-modalidade').textContent = titulos[modo];

  lista = [];
  renderizar();
  renderizarMemoria();
  mostrarMensagem(` Modo: ${titulos[modo]}`, 'aviso');
}

// ---------- Inserção ----------

function inserir() {
  const v = getValor();
  if (v === null) return;

  if (modalidade === 'inicio') {
    lista.unshift(criarNo(v));
    renderizar('inserir', 0);
    mostrarMensagem(` ${v} inserido no início!`, 'sucesso');

  } else if (modalidade === 'fim') {
    lista.push(criarNo(v));
    renderizar('inserir', lista.length - 1);
    mostrarMensagem(` ${v} inserido no fim!`, 'sucesso');

  } else if (modalidade === 'ordenada') {
    let idx = lista.findIndex(n => n.valor >= v);
    if (idx === -1) idx = lista.length;
    lista.splice(idx, 0, criarNo(v));
    renderizar('inserir', idx);
    mostrarMensagem(` ${v} inserido em ordem (posição ${idx})!`, 'sucesso');
  }

  renderizarMemoria();
}

// ---------- Remoções ----------

function removerInicio() {
  if (lista.length === 0) { mostrarMensagem(' Lista vazia!', 'aviso'); return; }
  const removido = lista.shift();
  renderizar('remover', 0);
  renderizarMemoria();
  mostrarMensagem(` ${removido.valor} removido do início!`, 'remover');
}

function removerFinal() {
  if (lista.length === 0) { mostrarMensagem(' Lista vazia!', 'aviso'); return; }
  const removido = lista.pop();
  renderizar('remover', lista.length);
  renderizarMemoria();
  mostrarMensagem(` ${removido.valor} removido do final!`, 'remover');
}

// ---------- Busca ----------

function buscar() {
  const v = getValor();
  if (v === null) return;
  const idx = lista.findIndex(n => n.valor === v);
  if (idx === -1) {
    mostrarMensagem(` ${v} não encontrado.`, 'aviso');
    return;
  }
  destacarNo(idx);
  destacarLinhaMemoria(idx);
  mostrarMensagem(` ${v} encontrado na posição ${idx}!`, 'busca');
}

// ---------- Reiniciar ----------

function reiniciar() {
  lista = [];
  renderizar();
  renderizarMemoria();
  mostrarMensagem(' Lista reiniciada!', 'aviso');
}

// ---------- Helpers ----------

function criarNo(valor) {
  return { valor, id: Date.now() + Math.random(), endereco: gerarEndereco() };
}

function getValor() {
  const input = document.getElementById('valor');
  const v = parseInt(input.value);
  if (isNaN(v)) { mostrarMensagem(' Digite um valor numérico!', 'aviso'); return null; }
  return v;
}

// ---------- Renderização da lista ----------

function renderizar(tipo, indiceAlvo) {
  const container = document.getElementById('lista');
  container.innerHTML = '';

  if (lista.length === 0) {
    // Mostra INÍCIO → NULL quando vazia
    container.innerHTML = `
      <span class="label-inicio-fixo">INÍCIO</span>
      <span class="seta-icone">→</span>
      <span class="null-label">NULL</span>
    `;
    return;
  }

  const labelInicio = document.createElement('span');
  labelInicio.className = 'label-inicio-fixo';
  labelInicio.textContent = 'INÍCIO';
  container.appendChild(labelInicio);

  const setaInicio = document.createElement('span');
  setaInicio.className = 'seta-icone';
  setaInicio.textContent = '→';
  container.appendChild(setaInicio);

  lista.forEach((no, i) => {
    const wrapper = document.createElement('div');
    wrapper.className = 'no-wrapper';
    wrapper.style.animationDelay = `${i * 0.06}s`;

    const noEl = document.createElement('div');
    noEl.className = 'no';
    noEl.dataset.id = no.id;

    if (tipo === 'inserir' && i === indiceAlvo) noEl.classList.add('no-novo');
    if (tipo === 'remover' && i === indiceAlvo) noEl.classList.add('no-saindo');

    noEl.innerHTML = `
      <div class="no-dados">${no.valor}</div>
      <div class="no-next">${i < lista.length - 1 ? lista[i+1].endereco : 'NULL'}</div>
    `;
    wrapper.appendChild(noEl);

    if (i < lista.length - 1) {
      const seta = document.createElement('span');
      seta.className = 'seta-icone';
      seta.textContent = '→';
      wrapper.appendChild(seta);
    }

    container.appendChild(wrapper);
  });
}

// ---------- Tabela de Memória ----------

function renderizarMemoria() {
  const tabela = document.getElementById('tabela-memoria');
  if (!tabela) return;

  const tbody = tabela.querySelector('tbody');
  tbody.innerHTML = '';

  if (lista.length === 0) {
    // Linha de início apontando para NULL
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>inicio</td>
      <td>0x0004</td>
      <td class="mem-null">NULL</td>
    `;
    tbody.appendChild(tr);
    return;
  }

  // Linha "inicio" aponta para endereço do primeiro nó
  const trInicio = document.createElement('tr');
  trInicio.className = 'mem-row-inicio';
  trInicio.innerHTML = `
    <td>inicio</td>
    <td>0x0004</td>
    <td class="mem-ptr">${lista[0].endereco}</td>
  `;
  tbody.appendChild(trInicio);

  // Separador
  const trSep = document.createElement('tr');
  trSep.className = 'mem-sep';
  trSep.innerHTML = `<td>...</td><td>...</td><td>...</td>`;
  tbody.appendChild(trSep);

  // Um nó por linha
  lista.forEach((no, i) => {
    const proxConteudo = i < lista.length - 1 ? lista[i+1].endereco : 'NULL';

    const trDados = document.createElement('tr');
    trDados.className = 'mem-row-dados mem-row-anim';
    trDados.dataset.idx = i;
    trDados.innerHTML = `
      <td>dados</td>
      <td>${no.endereco}</td>
      <td>${no.valor}</td>
    `;
    tbody.appendChild(trDados);

    const trProx = document.createElement('tr');
    trProx.className = 'mem-row-prox';
    trProx.innerHTML = `
      <td>prox</td>
      <td></td>
      <td class="${proxConteudo === 'NULL' ? 'mem-null' : 'mem-ptr'}">${proxConteudo}</td>
    `;
    tbody.appendChild(trProx);

    if (i < lista.length - 1) {
      const trSep2 = document.createElement('tr');
      trSep2.className = 'mem-sep';
      trSep2.innerHTML = `<td>...</td><td>...</td><td>...</td>`;
      tbody.appendChild(trSep2);
    }
  });
}

function destacarLinhaMemoria(idx) {
  document.querySelectorAll('.mem-row-dados').forEach((tr, i) => {
    tr.classList.toggle('mem-destaque', i === idx);
  });
}

function destacarNo(idx) {
  renderizar(null, -1);
  setTimeout(() => {
    const nos = document.querySelectorAll('.no');
    if (nos[idx]) nos[idx].classList.add('no-destaque');
  }, 50);
}

// ---------- Mensagem ----------

function mostrarMensagem(texto, tipo) {
  let msg = document.getElementById('mensagem-status');
  if (!msg) {
    msg = document.createElement('div');
    msg.id = 'mensagem-status';
    document.querySelector('.area-visual').prepend(msg);
  }
  msg.textContent = texto;
  msg.className = `mensagem-status mensagem-${tipo}`;
  msg.style.opacity = '1';

  if (mensagemTimer) clearTimeout(mensagemTimer);
  mensagemTimer = setTimeout(() => { msg.style.opacity = '0'; }, 3000);
}

// ---------- Init ----------
renderizar();
renderizarMemoria();