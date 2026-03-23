<?php
$titulo = 'Cadastro';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>
    <div>
        <p>
            Informamos que sua solicitação será analisada pela nossa equipe em até <b>48 horas</b>.
            Você receberá uma notificação com o resultado ou próximos passos diretamente
            no sistema ou por e-mail.
        </p>
    </div>

    <?php
    $modalConteudo = ob_get_clean();

    include './../../components/modal/modal.php';
    ?>

</body>