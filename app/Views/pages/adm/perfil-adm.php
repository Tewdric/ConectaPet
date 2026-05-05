<?php
// Simulação de dados (depois você pode puxar do banco)
$usuario = [
    "nome" => "Rafael Oliveira",
    "email" => "exemplo@gmail.com",
    "cpf" => "987.***.***-22",
    "senha" => "******",
    "endereco" => "Rua dos Ipês, 145 - Monte Castelo",
    "telefone" => "(67) 91876542",
    "foto" => "img/user.jpg"
];

$posts = [
    "total" => 48,
    "aprovados" => 36,
    "rejeitados" => 12,
    "tempo" => "2h 36min"
];
?>

<?php
$titulo = "Notificações";
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/nav_adm/sideBar.php'; ?>
    <div class="container">

        <main class="content">

            <h2>Perfil</h2>

            <!-- INFORMAÇÕES -->
            <section class="card perfil-box">
                <h3>Informações Pessoais</h3>

                <div class="perfil-info">
                    <img src="<?= $usuario['foto'] ?>" class="foto">

                    <div class="dados">
                        <p><strong>Nome:</strong> <?= $usuario['nome'] ?></p>
                        <p><strong>Email:</strong> <?= $usuario['email'] ?></p>
                        <p><strong>CPF:</strong> <?= $usuario['cpf'] ?></p>
                        <p><strong>Senha:</strong> <?= $usuario['senha'] ?></p>
                        <p><strong>Endereço:</strong> <?= $usuario['endereco'] ?></p>
                        <p><strong>Telefone:</strong> <?= $usuario['telefone'] ?></p>
                    </div>
                </div>
            </section>

            <!-- POSTAGENS -->
            <section class="card">
                <h3>Postagens</h3>

                <div class="cards">
                    <div class="box azul">
                        <h4><?= $posts['total'] ?></h4>
                        <p>Total de publicações</p>
                    </div>

                    <div class="box rosa">
                        <h4><?= $posts['aprovados'] ?></h4>
                        <p>Publicações aprovadas</p>
                    </div>

                    <div class="box roxo">
                        <h4><?= $posts['rejeitados'] ?></h4>
                        <p>Publicações rejeitadas</p>
                    </div>

                    <div class="box verde">
                        <h4><?= $posts['tempo'] ?></h4>
                        <p>Tempo médio</p>
                    </div>
                </div>
            </section>

        </main>
    </div>

</body>