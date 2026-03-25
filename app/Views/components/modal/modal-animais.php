<?php
$titulo = 'modal';
include './../../components/head/head.php';
?>

<body>

    <div class="animal-card">

        <div class="animal-container">

            <div class="animal-img">
                <img src="<?= $imagem ?>" alt="<?= $nome ?>">
            </div>

            <div class="animal-info">

                <p><?= $descricao ?></p>

                <div class="contato">

                    <div>
                        <b>Telefone:</b><br>
                        <a href="tel:<?= $telefone ?>"><?= $telefone ?></a>
                    </div>

                    <div>
                        <b>Email:</b><br>
                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                    </div>

                </div>

                <p>
                    A adoção está disponível em <b><?= $cidade ?></b>
                </p>

                <button class="btn-adotar" onclick="abrirModal()">
                    Adotar 🐾
                </button>
            </div>

        </div>

    </div>


    <!-- MODAL -->
    <div class="modal-overlay" id="modalAdocao">

        <div class="modal-box">

            <p class="modal-text">
                Olá! Para prosseguirmos com a adoção do seu animalzinho, é essencial que você responda a um questionário rápido. Ele nos ajuda a garantir que o pet encontre um lar perfeito e responsável.
                Obrigado pela sua dedicação! 🐾
            </p>

            <div class="modal-buttons">
                <button class="btn-voltar" onclick="fecharModal()">Voltar</button>

                <a href="../../pages/user/questionario.php">
                    <button class="btn-concluir">Ir para questionário 🐾</button>
                </a>
            </div>

        </div>

    </div>

    <script>
        function abrirModal() {
            document.getElementById("modalAdocao").style.display = "flex";
        }

        function fecharModal() {
            document.getElementById("modalAdocao").style.display = "none";
        }
    </script>
</body>