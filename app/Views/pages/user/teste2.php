<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<?php
$titulo = 'Acessibilidade';
include './../../components/head/head.php';
?>


<body>

<!--  -->

    <?php
    ob_start();
    ?>

    
<!-- filtro svg pra daltonismo -->
<svg class="svg-filters" aria-hidden="true">
  <defs>
    <filter id="deuteranopia">
      <feColorMatrix
        type="matrix"
        values="
        0.625 0.375 0     0 0
        0.7   0.3   0     0 0
        0     0.3   0.7   0 0
        0     0     0     1 0"
      />
    </filter>
    <filter id="protanopia">
      <feColorMatrix
        type="matrix"
        values="
        0.567 0.433 0     0 0
        0.558 0.442 0     0 0
        0     0.242 0.758 0 0
        0     0     0     1 0"
      />
    </filter>
    <filter id="tritanopia">
      <feColorMatrix
        type="matrix"
        values="
        0.95  0.05  0     0 0
        0     0.433 0.567 0 0
        0     0.475 0.525 0 0
        0     0     0     1 0"
      />
    </filter>
  </defs>
</svg>

<!-- botao de acessibilidade -->
<li>
  <a
    href="#"
    id="acc-trigger"
    aria-label="Abrir painel de acessibilidade"
    aria-expanded="false"
    aria-controls="acc-panel"
  >
    <img
      src="../../assets//img/acessibilidade.png"
      alt="Acessibilidade"
      width="24"
      height="24"
    />
  </a>
</li>

<!-- painel -->
<aside
  id="acc-panel"
  role="dialog"
  aria-modal="false"
  aria-label="Painel de acessibilidade"
>
  <div class="acc-header">
    <div class="acc-header-title">
      <img
        src="./../../assets//img/acessibilidade.png"
        alt=""
        aria-hidden="true"
        width="24"
        height="24"
        style="filter: brightness(0) invert(1)"
      />
      <h2>Acessibilidade</h2>
    </div>
    <button
      class="acc-close"
      id="acc-close"
      aria-label="Fechar painel de acessibilidade"
    >
      ✕
    </button>
  </div>

  <div class="acc-body">
    <p class="acc-group-label">Tamanho do texto</p>
    <div
      class="font-control"
      role="group"
      aria-label="Controle de tamanho de fonte"
    >
      <span>Texto</span>
      <div class="font-btns">
        <button id="font-decrease" aria-label="Diminuir fonte">A-</button>
        <span
          class="font-size-display"
          id="font-size-display"
          aria-live="polite"
          >100%</span
        >
        <button id="font-increase" aria-label="Aumentar fonte">A+</button>
      </div>
    </div>

    <hr class="acc-sep" />

    <p class="acc-group-label">Aparência</p>
    <div class="acc-grid" role="group" aria-label="Opções de aparência">
      <button class="acc-btn" id="btn-dark" aria-pressed="false">
        <span class="acc-btn-icon">🌙</span>Modo Escuro
      </button>
      <button class="acc-btn" id="btn-contrast" aria-pressed="false">
        <span class="acc-btn-icon">◑</span>Alto Contraste
      </button>
      <button class="acc-btn" id="btn-links" aria-pressed="false">
        <span class="acc-btn-icon">🔗</span>Destacar Links
      </button>
      <button class="acc-btn" id="btn-spacing" aria-pressed="false">
        <span class="acc-btn-icon">↕</span>Espaçamento
      </button>
      <button class="acc-btn" id="btn-cursor" aria-pressed="false">
        <span class="acc-btn-icon">🖱️</span>Cursor Grande
      </button>
      <button class="acc-btn" id="btn-motion" aria-pressed="false">
        <span class="acc-btn-icon">🚫</span>Sem Animações
      </button>
    </div>

    <hr class="acc-sep" />

    <p class="acc-group-label">Simulação de daltonismo</p>
    <div class="acc-select-wrap">
      <select id="color-filter" aria-label="Selecionar tipo de daltonismo">
        <option value="none">Nenhum (padrão)</option>
        <option value="deuteranopia">Deuteranopia (verde-vermelho)</option>
        <option value="protanopia">Protanopia (vermelho)</option>
        <option value="tritanopia">Tritanopia (azul-amarelo)</option>
        <option value="mono">Monocromático</option>
      </select>
    </div>

    <hr class="acc-sep" />

    <p class="acc-group-label">Leitor de texto (TTS)</p>
    <div class="acc-reader-wrap" role="group" aria-label="Leitor de texto">
      <div class="reader-speed">
        <label for="reader-speed">Velocidade:</label>
        <input
          type="range"
          id="reader-speed"
          min="0.5"
          max="2"
          step="0.1"
          value="1"
          aria-label="Velocidade de leitura"
        />
        <span id="reader-speed-val">1×</span>
      </div>
      <div class="reader-controls">
        <button class="reader-btn" id="btn-read-page">▶ Ler Página</button>
        <button class="reader-btn" id="btn-read-sel">✂ Seleção</button>
        <button class="reader-btn" id="btn-read-stop">⏹ Parar</button>
      </div>
      <div class="reader-status" id="reader-status" aria-live="polite"></div>
    </div>

    <hr class="acc-sep" />

    <button
      class="acc-reset"
      id="acc-reset"
      aria-label="Restaurar todas as configurações padrão"
    >
      🔄 Restaurar padrões
    </button>
  </div>
</aside>



