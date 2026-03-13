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

                <button class="btn-adotar">
                    Adotar 🐾
                </button>

            </div>

        </div>

    </div>
</body>