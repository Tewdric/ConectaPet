<?php
$titulo = 'Termo de Responsabilidade';
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

    <h2>Termo de Responsabilidade – Adoção de Animais</h2>

    <form class="form-cadastro">

        <p>
            Ao prosseguir com a adoção, o(a) adotante declara estar ciente e de acordo com as condições abaixo:
        </p>


        <div class="termo-texto">

            <p><b>1. Responsabilidade pelo Animal</b></p>
            <ul>
                <li>Comprometo-me a oferecer cuidados adequados ao animal adotado, incluindo alimentação, abrigo, higiene, atenção e acompanhamento veterinário sempre que necessário.</li>
            </ul>


            <p><b>2. Bem-estar do Animal</b></p>
            <ul>
                <li>Estou ciente de que o animal é um ser vivo, que sente dor, medo e afeto, e assumo o compromisso de tratá-lo com respeito e dignidade.</li>
            </ul>


            <p><b>3. Proibição de Abandono e Maus-tratos</b></p>
            <ul>
                <li>Reconheço que abandonar, maltratar ou negligenciar o animal constitui crime previsto em lei (Lei Federal nº 9.605/1998 – Lei de Crimes Ambientais, art. 32).</li>
            </ul>


            <p><b>4. Responsabilidade Legal</b></p>
            <ul>
                <li>Em caso de abandono, maus-tratos ou negligência, estou ciente de que poderei responder civil e criminalmente pelos meus atos.</li>
            </ul>


            <p><b>5. Consentimento</b></p>
            <ul>
                <li>Confirmo que li, compreendi e concordo com este Termo de Responsabilidade e que assumo total responsabilidade pelo animal a partir do momento da adoção.</li>
            </ul>sk


            <p><b>6. Penalidades por Infração</b></p>
            <ul>
                <li>Caso eu infrinja quaisquer regras ou leis relacionadas à adoção de animais, estou ciente de que minha conta poderá ser suspensa ou banida permanentemente da plataforma.</li>
            </ul>

        </div>

        <div class="checkbox-termo">

            <label class="opcao">
                <input class="input-questionario" type="checkbox" required>
                Declaro que li e aceito os termos acima.
            </label>

        </div>
        
    </form>

    <div class="botoes-modal">

        <a href="./rotina.php">
            <button type="button" onclick="history.back()" class="btn-voltar">
                Voltar
            </button>
        </a>

        <a href="./solicitacao.php">
            <button type="submit" class="btn-concluir">
                Enviar Solicitação 🐾
            </button>
        </a>

    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>