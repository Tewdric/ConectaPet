<?php
$titulo = 'Conta';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/nav_adm/sideBar.php'; ?>

    <div class="main-content">

        <?php
        // ✅ define o tipo
        $tipo = $_GET['tipo'] ?? 'usuarios';
        ?>
        <h2>Administrar Contas</h2>

        <div class="topo-tabela">
            <!-- FILTRO -->
            <div class="filtro">
                <a href="?tipo=usuarios">
                    <button class="<?= $tipo == 'usuarios' ? 'ativo' : '' ?>">Usuário</button>
                </a>

                <a href="?tipo=moderadores">
                    <button class="<?= $tipo == 'moderadores' ? 'ativo' : '' ?>">Moderador</button>
                </a>
            </div>

            <!-- BOTÃO CONDICIONAL -->
            <?php if ($tipo == 'moderadores'): ?>
                <button class="btn-criar" id="abrirModal">Criar novo Moderador</button>
            <?php endif; ?>

        </div>
        <?php
        // ✅ dados dinâmicos
        if ($tipo == 'moderadores') {
            $tituloTabela = "Moderadores";

            $usuarios = [
                ["id" => 10, "nome" => "Carlos", "data" => "05/02", "status" => "Ativo"],
                ["id" => 11, "nome" => "Ana", "data" => "06/02", "status" => "Ativo"]
            ];

            // 👇 NOVO
            $acoes = ['suspender', 'historico', 'mensagem', 'editar'];
        } else {
            $tituloTabela = "Usuários";

            $usuarios = [
                ["id" => 1, "nome" => "João", "data" => "01/01", "status" => "Ativo"],
                ["id" => 2, "nome" => "Maria", "data" => "02/02", "status" => "Ativo"]
            ];

            // 👇 NOVO
            $acoes = ['editar', 'suspender'];
        }

        // ✅ chama componente
        include './../../components/adm_component/tabela.php';
        ?>

    </div>

    <!-- script para oicone de suspende = cadeado  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.btn-acao.suspender').forEach(botao => {

                botao.addEventListener('click', function() {

                    let linha = this.closest('.linha');
                    let status = linha.querySelector('.status');
                    let icone = this.querySelector('i');

                    if (!status || !icone) return;

                    if (status.classList.contains('ativo')) {
                        // vai suspender
                        status.classList.remove('ativo');
                        status.classList.add('suspenso');
                        status.textContent = 'Suspenso';

                        // agora mostra abrir 🔓
                        icone.classList.remove('fa-lock');
                        icone.classList.add('fa-lock-open');

                    } else {
                        // vai ativar
                        status.classList.remove('suspenso');
                        status.classList.add('ativo');
                        status.textContent = 'Ativo';

                        // agora mostra fechar 🔒
                        icone.classList.remove('fa-lock-open');
                        icone.classList.add('fa-lock');
                    }

                });

            });

        });
    </script>

    <div class="modaladm" id="modal">

        <div class="modal2">

            <h3>Novo Moderador</h3>

            <form class="form-animal">

                <input type="text" placeholder="Nome completo" required>

                <input type="email" placeholder="Email" required>

                <input type="text" placeholder="Telefone" required>

                <div class="senha-group">

                    <div class="campo-senha">

                        <input type="password" id="senha" name="senha" placeholder="Confirme sua senha" required>
                        <span class="material-icons olho" onclick="toggleSenha()">
                            visibility
                        </span>

                    </div>
                </div>
                <input type="file" accept="image/*" required>

                <div class="modal-botoes">
                    <button class="btn-voltar" type="button" id="fecharModal">Cancelar</button>
                    <button class="btn-concluir" type="submit">Cadastrar</button>
                </div>

            </form>

        </div>

    </div>

    <!-- modal para cadastrarmoderadorr -->

    <script>
        const modal = document.getElementById('modal');
        const abrir = document.getElementById('abrirModal');
        const fechar = document.getElementById('fecharModal');

        abrir.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        fechar.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // fechar clicando fora
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

    <!-- alerta para todos os campos serem preenchidos -->
    <script>
        document.querySelector(".form-animal").addEventListener("submit", function(e) {
            let valido = true;

            // remove erros antigos
            document.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));

            // pega todos os campos obrigatórios
            const campos = this.querySelectorAll("[required]");

            campos.forEach(campo => {
                if (!campo.value || campo.value.trim() === "") {

                    if (campo.type === "hidden") {
                        campo.closest(".dropdown").classList.add("erro");
                    } else {
                        campo.classList.add("erro");
                    }

                    valido = false;
                }
            });

            // valida radio (porque é diferente)
            const radios = this.querySelectorAll("input[type='radio'][required]");
            const nomes = [...new Set([...radios].map(r => r.name))];

            nomes.forEach(nome => {
                const marcado = this.querySelector(`input[name="${nome}"]:checked`);
                if (!marcado) {
                    valido = false;

                    // marca todos do grupo
                    this.querySelectorAll(`input[name="${nome}"]`).forEach(r => {
                        r.parentElement.classList.add("erro");
                    });
                }
            });

            if (!valido) {
                e.preventDefault();
                alert("Preencha todos os campos obrigatórios!");
            } else {
                // aqui depois você vai salvar no banco
                alert("Moderador cadastrado com sucesso!");
            }
        });
    </script>

    <!-- olhinho da senha -->
    <script>
        function toggleSenha() {

            const senha = document.getElementById("senha");
            const icone = document.querySelector(".olho");

            if (senha.type === "password") {
                senha.type = "text";
                icone.textContent = "visibility_off";
            } else {
                senha.type = "password";
                icone.textContent = "visibility";
            }

        }
    </script>
</body>

</html>