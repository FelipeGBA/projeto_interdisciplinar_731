// =============================================
//   LISTA ENCADEADA — lista.js
//   Modalidades: início, fim, ordenada
// =============================================

let lista = [];
let modalidade = 'inicio'; // 'inicio' | 'fim' | 'ordenada'
let mensagemTimer = null;

// ---------- Modalidade ----------

function trocarModalidade(modo, btnEl) {
  modalidade = modo;

  // Atualiza tabs visuais
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  btnEl.classList.add('active');

  // Atualiza título
  const titulos = {
    inicio:   'Lista Encadeada ( Inserção Início )',
    fim:      'Lista Encadeada ( Inserção Fim )',
    ordenada: 'Lista Encadeada ( Inserção Ordenada )'
  };
  document.getElementById('titulo-modalidade').textContent = titulos[modo];

  // Limpa lista ao trocar modalidade
  lista = [];
  renderizar();
  mostrarMensagem(`🔄 Modo: ${titulos[modo]}`, 'aviso');
}

// ---------- Inserção conforme modalidade ----------

function inserir() {
  const v = getValor();
  if (v === null) return;

  if (modalidade === 'inicio') {
    lista.unshift(criarNo(v));
    renderizar('inserir', 0);
    mostrarMensagem(`✅ ${v} inserido no início!`, 'sucesso');

  } else if (modalidade === 'fim') {
    lista.push(criarNo(v));
    renderizar('inserir', lista.length - 1);
    mostrarMensagem(`✅ ${v} inserido no fim!`, 'sucesso');

  } else if (modalidade === 'ordenada') {
    let idx = lista.findIndex(n => n.valor >= v);
    if (idx === -1) idx = lista.length;
    lista.splice(idx, 0, criarNo(v));
    renderizar('inserir', idx);
    mostrarMensagem(`✅ ${v} inserido em ordem (posição ${idx})!`, 'sucesso');
  }
}

// ---------- Remoções ----------

function removerInicio() {
  if (lista.length === 0) { mostrarMensagem('⚠️ Lista vazia!', 'aviso'); return; }
  const removido = lista.shift();
  renderizar('remover', 0);
  mostrarMensagem(`🗑️ ${removido.valor} removido do início!`, 'remover');
}

function removerFinal() {
  if (lista.length === 0) { mostrarMensagem('⚠️ Lista vazia!', 'aviso'); return; }
  const removido = lista.pop();
  renderizar('remover', lista.length);
  mostrarMensagem(`🗑️ ${removido.valor} removido do final!`, 'remover');
}

// ---------- Busca ----------

function buscar() {
  const v = getValor();
  if (v === null) return;
  const idx = lista.findIndex(n => n.valor === v);
  if (idx === -1) {
    mostrarMensagem(`🔍 ${v} não encontrado.`, 'aviso');
    return;
  }
  destacarNo(idx);
  mostrarMensagem(`🔍 ${v} encontrado na posição ${idx}!`, 'busca');
}

// ---------- Reiniciar ----------

function reiniciar() {
  lista = [];
  renderizar();
  mostrarMensagem('🔄 Lista reiniciada!', 'aviso');
}

// ---------- Helpers ----------

function criarNo(valor) {
  return { valor, id: Date.now() + Math.random() };
}

function getValor() {
  const input = document.getElementById('valor');
  const v = parseInt(input.value);
  if (isNaN(v)) { mostrarMensagem('⚠️ Digite um valor numérico!', 'aviso'); return null; }
  return v;
}

// ---------- Renderização ----------

function renderizar(tipo, indiceAlvo) {
  const container = document.getElementById('lista');
  container.innerHTML = '';

  if (lista.length === 0) {
    container.innerHTML = '<div class="lista-vazia">Lista vazia — insira um valor para começar</div>';
    return;
  }

  lista.forEach((no, i) => {
    const wrapper = document.createElement('div');
    wrapper.className = 'no-wrapper';
    wrapper.style.animationDelay = `${i * 0.05}s`;

    // Label INÍCIO no primeiro nó
    if (i === 0) {
      const label = document.createElement('div');
      label.className = 'label-inicio';
      label.textContent = 'INÍCIO';
      wrapper.appendChild(label);
    }

    // Nó
    const noEl = document.createElement('div');
    noEl.className = 'no';
    noEl.dataset.id = no.id;

    if (tipo === 'inserir' && i === indiceAlvo) noEl.classList.add('no-novo');
    if (tipo === 'remover' && i === indiceAlvo) noEl.classList.add('no-saindo');

    // Parte dados + parte ponteiro (estilo DebugandoED)
    noEl.innerHTML = `
      <div class="no-dados">${no.valor}</div>
      <div class="no-next">${i < lista.length - 1 ? '→' : 'NULL'}</div>
    `;
    wrapper.appendChild(noEl);

    // Seta entre nós
    if (i < lista.length - 1) {
      const seta = document.createElement('div');
      seta.className = 'seta-icone';
      seta.textContent = '→';
      wrapper.appendChild(seta);
    }

    container.appendChild(wrapper);
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
