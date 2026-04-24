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

    <!-- modal para cadastrar moderdor -->
    <div class="modaladm" id="modal">

        <div class="modal2">
            <h3>Novo Moderador</h3>
            <form class="form-animal">

                <label>Nome completo</label>
                <input type="text" placeholder="Ex: João Silva" required>

                <label>Email</label>
                <input type="email" placeholder="Ex: joao@email.com" required>

                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="Ex: (67) 99999-9999" maxlength="15" required>

                <label>CPF</label>
                <input type="text" name="cpf" placeholder="Ex: 000.000.000-00" maxlength="14" required>

                <label>Foto</label>
                <input type="file" accept="image/*" required>

                <div class="botoes-modal">
                    <button class="btn-voltar" type="button" id="fecharModal">Cancelar</button>
                    <button class="btn-concluir" type="submit">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
    <!-- modal para historico do moderador -->

    <div class="modaladm" id="modalHistorico">

        <div class="modal2">

            <h3>Histórico do Moderador</h3>

            <div class="tabela-historico">

                <div class="topo">
                    <span>Ação</span>
                    <span>Descrição</span>
                    <span>Data</span>
                </div>

                <div id="conteudoHistorico"></div>

            </div>

            <button class="btn-voltar" id="fecharHistorico">Fechar</button>

        </div>

    </div>

    <!-- modal de mensagem -->

    <div class="modaladm" id="modalMensagem">

        <div class="modal2">

            <h3>Enviar mensagem para <span id="nomeUsuario"></span></h3>

            <form id="formMensagem">

                <textarea id="mensagemTexto" placeholder="Digite sua mensagem..." required></textarea>

                <div class="botoes-modal">
                    <button type="button" class="btn-voltar" id="fecharMensagem">Cancelar</button>
                    <button type="submit" class="btn-concluir">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <!-- script modal de mensagem -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modalMsg = document.getElementById("modalMensagem");
            const fecharMsg = document.getElementById("fecharMensagem");
            const nomeSpan = document.getElementById("nomeUsuario");
            const form = document.getElementById("formMensagem");
            const textarea = document.getElementById("mensagemTexto");

            let usuarioId = null;

            // abrir modal
            document.querySelectorAll('.btn-acao.mensagem').forEach(botao => {

                botao.addEventListener('click', function() {

                    usuarioId = this.dataset.id;
                    const nome = this.dataset.nome;

                    nomeSpan.textContent = nome;

                    modalMsg.style.display = 'flex';
                    textarea.value = "";

                });

            });

            // fechar
            fecharMsg.addEventListener('click', () => {
                modalMsg.style.display = 'none';
            });

            modalMsg.addEventListener('click', (e) => {
                if (e.target === modalMsg) {
                    modalMsg.style.display = 'none';
                }
            });

            // enviar mensagem
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const mensagem = textarea.value.trim();

                if (!mensagem) {
                    alert("Digite uma mensagem!");
                    return;
                }

                // 🔥 AQUI depois você salva no banco
                console.log("Enviando para ID:", usuarioId);
                console.log("Mensagem:", mensagem);

                alert("Mensagem enviada com sucesso!");

                modalMsg.style.display = 'none';
            });

        });
    </script>

    <!-- script do modal para cadastrar moderadorr -->

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

    <!-- script para historico -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modalHist = document.getElementById("modalHistorico");
            const fecharHist = document.getElementById("fecharHistorico");
            const conteudo = document.getElementById("conteudoHistorico");

            document.querySelectorAll('.btn-acao.historico').forEach(botao => {

                botao.addEventListener('click', function() {

                    const id = this.dataset.id;

                    modalHist.style.display = 'flex';

                    // 🔥 SIMULAÇÃO (depois conecta no banco)
                    let dados = [{
                            acao: "Criação",
                            desc: "Moderador criado",
                            data: "05/02 10:00"
                        },
                        {
                            acao: "Edição",
                            desc: "Alterou dados",
                            data: "06/02 14:30"
                        },
                        {
                            acao: "Suspensão",
                            desc: "Suspendeu usuário",
                            data: "07/02 18:20"
                        }
                    ];

                    conteudo.innerHTML = "";

                    dados.forEach(item => {
                        conteudo.innerHTML += `
                    <div class="linha">
                        <span>${item.acao}</span>
                        <span>${item.desc}</span>
                        <span>${item.data}</span>
                    </div>
                `;
                    });

                });

            });

            fecharHist.addEventListener('click', () => {
                modalHist.style.display = 'none';
            });

            modalHist.addEventListener('click', (e) => {
                if (e.target === modalHist) {
                    modalHist.style.display = 'none';
                }
            });

        });
    </script>
</body>

</html>