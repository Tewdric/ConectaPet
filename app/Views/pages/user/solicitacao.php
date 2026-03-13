<?php
$titulo = 'Solicitação Enviada';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>

    <div class="confirmacao-box">

        <h2>Solicitação enviada com sucesso 🐾</h2>

        <p>
            Informamos que sua solicitação será analisada pela nossa equipe em até <b>48 horas</b>.
            Você receberá uma notificação com o resultado ou próximos passos diretamente
            no sistema ou por e-mail.
        </p>

        <p>
            Caso tenha dúvidas, entre em contato conosco.
        </p>

        <p>
            Estamos na torcida para que essa jornada de adoção seja incrível!
        </p>

        <p class="assinatura">
            Com carinho,<br>
            Equipe Conecta Pet
        </p>

        <div class="botoes-modal">

            <a href="./home.php" class="btn-concluir">
                Voltar para Home 🐾
            </a>

        </div>

    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>