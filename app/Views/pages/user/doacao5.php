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
    
    <div class="progress-steps">
        <span class="active">1</span>
        <span class="active">2</span>
        <span class="active">3</span>
        <span class="active">4</span>
        <span class="active">5</span>
    
    </div>

    <div class="confirmacao-box">

        <h2>🐾 O cadastro do animal está em análise!</h2>

        <p>
            Agradecemos muito por cadastrar um animalzinho para doação! Sua iniciativa vai ajudar a encontrar um lar cheio de amor para ele.
            Seu cadastro foi recebido com sucesso e será analisado pela nossa equipe em até 48 horas. Você será notificado(a) sobre o status da publicação (aprovada ou pendente de ajustes) diretamente no sistema ou por e-mail.
            Se tiver alguma dúvida, é só nos contatar. Obrigado por fazer a diferença na vida de um animal!
        </p>

        <p>
            Se tiver alguma dúvida, é só nos contatar. Obrigado por fazer a diferença na vida de um animal!
        </p>

        <p class="assinatura">
            Com carinho,<br>
            Equipe Conecta Pet
        </p>

        <class class="bt">

            <a href="./home.php">
                <button class="bt_home">
                    Voltar para Home 🐾
                </button>
            </a>
        </class>

    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>