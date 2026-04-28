<?php
$titulo = 'Favoritos';
?>
<?php
include './../../components/head/head.php';
?>

<body>

    <!-- navbar -->
    <?php include './../../components/nav/navBar.php'; ?>

    <section class="favoritos-container">

        <div class="topo-favoritos">

            <div class="filtros-favoritos">

                <!-- pesquisa -->
                <div class="box-pesquisa">

                    <textarea class="input-pesquisa-fav" placeholder="Pesquisar pet..."></textarea>

                    <button class="btn-pesquisa-fav">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                </div>
                <!-- dropdown -->
                <div class="dropdown">
                    <div class="dropdown-selected">Selecione um tipo</div>

                    <div class="dropdown-options">
                        <div class="option">Gatos</div>
                        <div class="option">Cachorro</div>
                        <div class="option">Aves</div>
                        <div class="option">Outros</div>
                    </div>

                    <!-- valor enviado -->
                    <input type="hidden" name="tipoAnimal" required>
                </div>

            </div>

        </div>

        <div class="favoritos-cards">

            <?php for ($i = 0; $i < 4; $i++) { ?>

                <div class="card-favorito">
                    <img src="./../../assets/img/gt.jpg" alt="Pet">

                    <div class="card-info">
                        <h3>Mel</h3>
                        <p>Fêmea • Filhote</p>
                        <span>Campo Grande - MS</span>

                        <div class="acoes">
                            <button class="btn-ver">Ver Perfil</button>
                            <button class="btn-remover">Remover</button>
                        </div>
                    </div>
                </div>
                <div class="card-favorito">
                    <img src="./../../assets/img/ha.jpg" alt="Pet">

                    <div class="card-info">
                        <h3>Theodor</h3>
                        <p>Macho • Filhote</p>
                        <span>Campo Grande - MS</span>

                        <div class="acoes">
                            <button class="btn-ver">Ver Perfil</button>
                            <button class="btn-remover">Remover</button>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>

    </section>

    <script>
        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(dropdown => {
            const selected = dropdown.querySelector(".dropdown-selected");
            const options = dropdown.querySelectorAll(".option");
            const hidden = dropdown.querySelector("input[type='hidden']");

            selected.addEventListener("click", () => {
                dropdown.classList.toggle("active");
            });

            options.forEach(option => {
                option.addEventListener("click", () => {
                    selected.textContent = option.textContent;
                    dropdown.classList.remove("active");

                    if (hidden) hidden.value = option.textContent;

                    // campo "Outro"
                    const campo = dropdown.closest(".campo");
                    const outroInput = document.querySelector(".outroAssunto");

                    if (option.textContent === "Outro" && outroInput) {
                        outroInput.style.display = "block";
                        outroInput.required = true;
                    } else if (outroInput) {
                        outroInput.style.display = "none";
                        outroInput.required = false;
                    }
                });
            });

            document.addEventListener("click", (e) => {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove("active");
                }
            });
        });
    </script>

</body>