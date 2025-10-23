import { setupMenuToggle } from "./navbar.js";
import { paginacao } from "./paginacao.js";

console.log("main.js carregado");
document.addEventListener("DOMContentLoaded", () => {
  setupMenuToggle();
  paginacao();
});
