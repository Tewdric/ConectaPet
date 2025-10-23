console.log("paginacao.js carregado");

export function paginacao() {
  const cards = document.querySelector(".cards");
  const dots = document.querySelectorAll(".dot");
  const cardsPerPage = 4;
  const totalCards = document.querySelectorAll(".card").length;
  const totalPages = Math.ceil(totalCards / cardsPerPage);

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      dots.forEach((d) => d.classList.remove("active"));
      dot.classList.add("active");

      const offset = -index * 100;
      cards.style.transform = `translateX(${offset}%)`;
    });
  });
}
