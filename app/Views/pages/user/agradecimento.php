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

        <h2>Mensagem enviada com sucesso 🐾</h2>

        <p>
            Obrigado por entrar em contato com a equipe do Conecta Pet. Recebemos sua mensagem e em breve um de nossos colaboradores retornará para ajudar no que for necessário.
            Nosso compromisso é garantir que você tenha a melhor experiência possível, seja para adotar, apoiar ou simplesmente conhecer mais sobre nosso trabalho. Pedimos apenas que aguarde alguns instantes enquanto analisamos sua solicitação.
            Enquanto isso, você pode continuar navegando pelo site e conhecendo nossos pets disponíveis para adoção, histórias inspiradoras e formas de contribuir com a causa.
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