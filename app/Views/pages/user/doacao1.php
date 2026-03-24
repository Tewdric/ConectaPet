<?php
$titulo = 'Contato';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php
    ob_start();
    ?>
    <h2>Apresente seu Aumigo 🐾</h2>

    <form class="form-animal">

        <!-- INFORMAÇÕES BÁSICAS -->
        <fieldset>
            <legend>Informações básicas</legend>

            <label>Nome do pet</label>
            <input type="text">

            <label>Raça do pet (se houver)</label>
            <input type="text">

            <label>Idade aproximada</label>
            <input type="date">

            <label>Tipo de Animal</label>
            <select>
                <option>Selecione</option>
                <option>Cachorro</option>
                <option>Gato</option>
            </select>

            <label>Gênero</label>
            <div class="radio-group">
                <label><input type="radio" name="genero"> Macho</label>
                <label><input type="radio" name="genero"> Fêmea</label>
            </div>
        </fieldset>

        <!-- SAÚDE -->
        <fieldset>
            <legend>Saúde e cuidados</legend>

            <label>O animal está vacinado?</label>
            <select>
                <option>Selecione</option>
                <option>Sim</option>
                <option>Não</option>
            </select>

            <label>Peso</label>
            <select>
                <option>Selecione</option>
            </select>

            <label>Castrado</label>
            <div class="radio-group">
                <label><input type="radio" name="castrado"> Sim</label>
                <label><input type="radio" name="castrado"> Não</label>
            </div>
        </fieldset>

        <!-- CONTATO -->
        <fieldset>
            <legend>Contato e localização</legend>

            <label>E-mail</label>
            <input type="email">

            <label>Telefone</label>
            <input type="text">

            <label>Localização</label>
            <input type="text">
        </fieldset>

        <!-- SOBRE -->
        <fieldset>
            <legend>Sobre o pet</legend>

            <label>Foto</label>
            <input type="file">

            <label>Descrição</label>
            <textarea></textarea>
        </fieldset>

        <div class="botoes">
            <button class="btn-voltar">Voltar</button>
            <button class="btn-continuar">Continuar 🐾</button>
        </div>

    </form>

</body>