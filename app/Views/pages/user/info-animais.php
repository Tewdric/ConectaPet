<?php
$titulo = 'Informaçoes';
?>
<?php
include './../../components/head/head.php';
?>

<body id="body-info-animais">

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php

    $nome = "Priscila";

    $imagem = "../../assets/img/dog-card.png";
    $descricao = "Olá! Estou buscando um novo lar amoroso para o Theo, um cachorro de 1 ano cheio de energia e muito carinhoso. Ele é saudável, brincalhão e adora correr, brincar e receber atenção. Theo gosta muito de interagir com as pessoas e é um ótimo companheiro para o dia a dia.

Ele está acostumado a conviver com pessoas e se adapta bem a um ambiente com carinho e cuidado.

O motivo da doação é que, no momento, não estamos conseguindo oferecer o tempo e a atenção que ele merece. Se você pode proporcionar um lar cheio de amor e cuidado para o Theo, entre em contato!";
    $telefone = "(11) 98765-4321";
    $email = "exemplo@email.com";
    $cidade = "Campo Grande, MS";

    include('../../components/modal/modal-animais.php');

    ?>
</body>