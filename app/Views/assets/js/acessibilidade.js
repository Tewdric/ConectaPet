(function () {
  "use strict";

  // elementos do som
  const html = document.documentElement;
  const trigger = document.getElementById("acc-trigger");
  const panel = document.getElementById("acc-panel");
  const closeBtn = document.getElementById("acc-close");
  const resetBtn = document.getElementById("acc-reset");

  // Fonte
  const fontInc = document.getElementById("font-increase");
  const fontDec = document.getElementById("font-decrease");
  const fontDisp = document.getElementById("font-size-display");

  // Modos
  const btnDark = document.getElementById("btn-dark");
  const btnContrast = document.getElementById("btn-contrast");
  const btnLinks = document.getElementById("btn-links");
  const btnSpacing = document.getElementById("btn-spacing");
  const btnCursor = document.getElementById("btn-cursor");
  const btnMotion = document.getElementById("btn-motion");

  // Daltonismo
  const colorFilter = document.getElementById("color-filter");

  // Leitor
  const btnReadPage = document.getElementById("btn-read-page");
  const btnReadSel = document.getElementById("btn-read-sel");
  const btnReadStop = document.getElementById("btn-read-stop");
  const readerSpeed = document.getElementById("reader-speed");
  const readerSpeedVal = document.getElementById("reader-speed-val");
  const readerStatus = document.getElementById("reader-status");

  // estado
  let fontSize = 100; // porcentagem
  const MIN_FONT = 70;
  const MAX_FONT = 160;

  const DALTONISM_CLASSES = [
    "filter-deuteranopia",
    "filter-protanopia",
    "filter-tritanopia",
    "filter-mono",
  ];

  // abrir e fechar painel
  function openPanel() {
    panel.classList.add("open");
    trigger.setAttribute("aria-expanded", "true");
    closeBtn.focus();
  }

  function closePanel() {
    panel.classList.remove("open");
    trigger.setAttribute("aria-expanded", "false");
    trigger.focus();
  }

  trigger.addEventListener("click", () => {
    panel.classList.contains("open") ? closePanel() : openPanel();
  });

  closeBtn.addEventListener("click", closePanel);

  // Fechar com Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && panel.classList.contains("open")) closePanel();
  });

  // tamanho da fonte
  function applyFontSize() {
    html.style.fontSize = fontSize + "%";
    fontDisp.textContent = fontSize + "%";
    saveState();
  }

  fontInc.addEventListener("click", () => {
    if (fontSize < MAX_FONT) {
      fontSize = Math.min(fontSize + 10, MAX_FONT);
      applyFontSize();
    }
  });

  fontDec.addEventListener("click", () => {
    if (fontSize > MIN_FONT) {
      fontSize = Math.max(fontSize - 10, MIN_FONT);
      applyFontSize();
    }
  });

  // toggle generico dos modos
  function makeToggle(btn, htmlClass) {
    btn.addEventListener("click", () => {
      const active = btn.classList.toggle("active");
      btn.setAttribute("aria-pressed", String(active));

      if (active) {
        html.classList.add(htmlClass);

        // Modos exclusivos: escuro e alto contraste não coexistem
        if (
          htmlClass === "mode-dark" &&
          html.classList.contains("mode-contrast")
        ) {
          btnContrast.classList.remove("active");
          btnContrast.setAttribute("aria-pressed", "false");
          html.classList.remove("mode-contrast");
        }
        if (
          htmlClass === "mode-contrast" &&
          html.classList.contains("mode-dark")
        ) {
          btnDark.classList.remove("active");
          btnDark.setAttribute("aria-pressed", "false");
          html.classList.remove("mode-dark");
        }
      } else {
        html.classList.remove(htmlClass);
      }

      saveState();
    });
  }

  makeToggle(btnDark, "mode-dark");
  makeToggle(btnContrast, "mode-contrast");
  makeToggle(btnLinks, "highlight-links");
  makeToggle(btnSpacing, "reading-spacing");
  makeToggle(btnCursor, "big-cursor");
  makeToggle(btnMotion, "reduce-motion");

  // daltonismo
  colorFilter.addEventListener("change", () => {
    DALTONISM_CLASSES.forEach((c) => html.classList.remove(c));
    const val = colorFilter.value;
    if (val !== "none") html.classList.add("filter-" + val);
    saveState();
  });

  // leitor de texto
  const synth = window.speechSynthesis || null;
  let utterance = null;
  let highlightedEl = null;

  function getPageText() {
    const main = document.getElementById("main-content");
    return main ? main.innerText : document.body.innerText;
  }

  function removeHighlight() {
    if (highlightedEl) {
      highlightedEl.classList.remove("reader-highlight");
      highlightedEl = null;
    }
  }

  function speak(text, label) {
    stopReading();

    if (!synth) {
      readerStatus.textContent = "⚠️ Navegador não suporta leitura de voz.";
      return;
    }

    utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = "pt-BR";
    utterance.rate = parseFloat(readerSpeed.value);
    utterance.pitch = 1;

    utterance.onstart = () => {
      readerStatus.textContent = "🔊 Lendo: " + label + "…";
      btnReadPage.classList.add("playing");
    };

    utterance.onend = utterance.onerror = () => {
      readerStatus.textContent = "✅ Leitura concluída.";
      btnReadPage.classList.remove("playing");
      removeHighlight();
    };

    synth.speak(utterance);
  }

  function stopReading() {
    if (synth) synth.cancel();
    btnReadPage.classList.remove("playing");
    readerStatus.textContent = "";
    removeHighlight();
  }

  btnReadPage.addEventListener("click", () => speak(getPageText(), "página"));
  btnReadStop.addEventListener("click", stopReading);

  btnReadSel.addEventListener("click", () => {
    const sel = window.getSelection().toString().trim();
    if (sel) {
      speak(sel, "seleção");
    } else {
      readerStatus.textContent = "⚠️ Selecione um texto na página primeiro.";
    }
  });

  // Leitura ao clicar em elementos de texto
  document.addEventListener("click", (e) => {
    if (panel.contains(e.target) || trigger === e.target) return;
    const el = e.target.closest(
      "p, h1, h2, h3, h4, h5, h6, li, label, a, td, th",
    );
    if (!el) return;
    removeHighlight();
    highlightedEl = el;
    el.classList.add("reader-highlight");
    speak(el.innerText, "elemento");
  });

  // Controle de velocidade
  readerSpeed.addEventListener("input", () => {
    const v = parseFloat(readerSpeed.value);
    readerSpeedVal.textContent = v.toFixed(1) + "×";
    if (utterance) utterance.rate = v;
  });

  // reset geral
  function resetAll() {
    // Fonte
    fontSize = 100;
    applyFontSize();

    // Remove todas as classes de acessibilidade
    const accClasses = [
      "mode-dark",
      "mode-contrast",
      "highlight-links",
      "reading-spacing",
      "big-cursor",
      "reduce-motion",
      ...DALTONISM_CLASSES,
    ];
    accClasses.forEach((c) => html.classList.remove(c));

    // Reseta botões
    [btnDark, btnContrast, btnLinks, btnSpacing, btnCursor, btnMotion].forEach(
      (b) => {
        b.classList.remove("active");
        b.setAttribute("aria-pressed", "false");
      },
    );

    // Reseta daltonismo
    colorFilter.value = "none";

    // Para o leitor
    stopReading();
    readerSpeed.value = 1;
    readerSpeedVal.textContent = "1.0×";

    // Limpa localStorage
    try {
      localStorage.removeItem("conectapet_acc");
    } catch (e) {}
  }

  resetBtn.addEventListener("click", resetAll);

  // persistência no localStorage
  function saveState() {
    try {
      const state = {
        fontSize,
        dark: btnDark.classList.contains("active"),
        contrast: btnContrast.classList.contains("active"),
        links: btnLinks.classList.contains("active"),
        spacing: btnSpacing.classList.contains("active"),
        cursor: btnCursor.classList.contains("active"),
        motion: btnMotion.classList.contains("active"),
        filter: colorFilter.value,
        speed: readerSpeed.value,
      };
      localStorage.setItem("conectapet_acc", JSON.stringify(state));
    } catch (e) {}
  }

  function loadState() {
    try {
      const raw = localStorage.getItem("conectapet_acc");
      if (!raw) return;
      const s = JSON.parse(raw);

      if (s.fontSize) {
        fontSize = s.fontSize;
        applyFontSize();
      }

      function applyToggle(flag, btn, cls) {
        if (flag) {
          btn.classList.add("active");
          btn.setAttribute("aria-pressed", "true");
          html.classList.add(cls);
        }
      }

      applyToggle(s.dark, btnDark, "mode-dark");
      applyToggle(s.contrast, btnContrast, "mode-contrast");
      applyToggle(s.links, btnLinks, "highlight-links");
      applyToggle(s.spacing, btnSpacing, "reading-spacing");
      applyToggle(s.cursor, btnCursor, "big-cursor");
      applyToggle(s.motion, btnMotion, "reduce-motion");

      if (s.filter && s.filter !== "none") {
        colorFilter.value = s.filter;
        DALTONISM_CLASSES.forEach((c) => html.classList.remove(c));
        html.classList.add("filter-" + s.filter);
      }

      if (s.speed) {
        readerSpeed.value = s.speed;
        readerSpeedVal.textContent = parseFloat(s.speed).toFixed(1) + "×";
      }
    } catch (e) {}
  }

  // Carrega ao iniciar
  loadState();
})();
