<?php
$titulo = 'Informaçoes';
?>
<?php
include './../../components/head/head.php';
?>

<body>
    <!-- navbar -->

    <?php

    $nome = "Priscila";

    $imagem = $baseImg . "../../assets/img/calopsita.png";
    $descricao = "Olá! Estou buscando um novo lar amoroso para a  Priscila cheia de energia e personalidade. Ela é saudável, carinhosa e adora interagir com quem está ao seu redor. Priscila está acostumada a um ambiente tranquilo e gosta de cantar pela manhã.
Estamos doando ela com todos os acessórios: gaiola, brinquedos e comedouros.
 O motivo da doação é que não conseguimos mais oferecer o tempo e a atenção que ela merece. Se você tem experiência com aves e pode proporcionar um lar cheio de carinho, entre em contato!";
    $telefone = "(11) 98765-4321";
    $email = "exemplo@email.com";
    $cidade = "Campo Grande, MS";

    include('../../components/modal/modal-animais.php');

    ?>
</body>