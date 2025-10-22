export function setupMenuToggle() {
  // 1. Seleciona o ícone "sandwich" (o ID que usamos no HTML/CSS)
  const menuIcon = document.querySelector("#navbar-sandwich");

  // 2. Seleciona o menu de links (a classe que usamos)
  const menuLinks = document.querySelector(".navbar-menu");

  // 3. Seleciona o menu de ícones sociais (a outra classe que usamos)
  const menuSocial = document.querySelector(".navbar-social");

  // Verifica se todos os elementos corretos foram encontrados
  if (!menuIcon || !menuLinks || !menuSocial) {
    console.warn(
      "Não foi possível encontrar os elementos do menu para o toggle."
    );
    return;
  }

  // Adiciona o evento de clique no ícone "sandwich"
  menuIcon.addEventListener("click", () => {
    // 4. Alterna a classe ".active" (que é a classe que o seu CSS usa)
    menuLinks.classList.toggle("active");
    menuSocial.classList.toggle("active");
  });
}
