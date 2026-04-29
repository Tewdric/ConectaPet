<?php
$titulo = 'Meu Perfil';
include './../../components/head/head.php';
?>

<link rel="stylesheet" href="./perfil_usuario.css">

<body>

  <?php include './../../components/nav/navBar.php'; ?>

  <main class="perfil-page">

    <!-- CARD PERFIL -->
    <section class="perfil-card">

      <div class="perfil-titulo">
        <span>Informações Pessoais</span>
      </div>

      <button class="btn-editar" id="abrirEditar">
        <i class="fa-solid fa-pen-to-square"></i>
      </button>

      <div class="perfil-grid">

        <div class="perfil-foto">
          <img src="https://img.freepik.com/fotos-premium/garota-feliz-segura-seu-amado-animal-de-estimacao-um-gato-britanico-escoces-vermelho-no-colo-e-acaricia-seu-pelo_121837-9908.jpg?semt=ais_hybrid&w=740&q=80"
            alt="Foto do usuário">
        </div>

        <div class="perfil-dados">

          <div class="campo">
            <span class="label">Nome:</span>
            <span class="valor">Julia Rocha</span>
          </div>

          <div class="campo">
            <span class="label">Telefone:</span>
            <span class="valor">(67) 9999-9999</span>
          </div>

          <div class="campo">
            <span class="label">E-mail:</span>
            <span class="valor">exemplo@gmail.com</span>
          </div>

        </div>

      </div>

    </section>


    <!-- MENU -->
    <section class="abas">

      <button class="aba ativa" onclick="trocarAba('notificacoes', this)">Notificações</button>
      <button class="aba" onclick="trocarAba('adocao', this)">Adoção</button>
      <button class="aba" onclick="trocarAba('doacao', this)">Doação</button>

    </section>


    <!-- CONTEÚDO -->
    <section class="conteudo-abas">

      <!-- NOTIFICAÇÕES -->
      <div class="painel ativo" id="notificacoes">

        <div class="lista-card">

          <div class="linha-item">
            <span class="tag aprovado">Aprovação</span>
            <p>É com grande alegria que informamos que seu pedido para adoção do animalzinho foi aprovado.</p>
          </div>

          <div class="linha-item">
            <span class="tag aprovado">Aprovação</span>
            <p>É com grande alegria que informamos que seu pedido para adoção do animalzinho foi aprovado.</p>
          </div>

          <div class="linha-item">
            <span class="tag aprovado">Aprovação</span>
            <p>É com grande alegria que informamos que seu pedido para adoção do animalzinho foi aprovado.</p>
          </div>

        </div>

      </div>


      <!-- ADOÇÃO -->
      <div class="painel" id="adocao">

        <div class="lista-card">

          <div class="linha-item">
            <span class="tag analise">Pedido</span>
            <p>Seu pedido de adoção está em análise no momento.</p>
          </div>

        </div>

      </div>


      <!-- DOAÇÃO -->
      <div class="painel" id="doacao">

        <div class="lista-card">

          <div class="linha-item">
            <span class="tag doacao">Doação</span>
            <p>Muito obrigado pela sua contribuição para nossos animais.</p>
          </div>

        </div>

      </div>

    </section>

  </main>



  <!-- MODAL EDITAR PERFIL -->
  <div class="modaladm" id="modalEditar">

    <div class="modal2">

      <h3>Editar Perfil</h3>

      <form id="formEditarPerfil">

        <label>Telefone</label>
        <input type="text" id="editTelefone" value="(67) 9999-9999" maxlength="15" required>

        <label>E-mail</label>
        <input type="email" id="editEmail" value="exemplo@gmail.com" required>

        <label>Nova Senha</label>
        <input type="password" id="editSenha" placeholder="Digite a nova senha">

        <label>Confirmar Senha</label>
        <input type="password" id="editConfirmar" placeholder="Confirme a senha">

        <div class="botoes-modal">
          <button type="button" class="btn-voltar" id="fecharEditar">Cancelar</button>
          <button type="submit" class="btn-concluir">Salvar</button>
        </div>

      </form>

    </div>

  </div>


  <script>
    function trocarAba(id, botao) {

      document.querySelectorAll('.painel').forEach(item => {
        item.classList.remove('ativo');
      });

      document.querySelectorAll('.aba').forEach(item => {
        item.classList.remove('ativa');
      });

      document.getElementById(id).classList.add('ativo');
      botao.classList.add('ativa');
    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {

      const modalEditar = document.getElementById("modalEditar");

      function abrir(modal) {
        modal.style.display = "flex";
      }

      function fechar(modal) {
        modal.style.display = "none";
      }

      function fecharFora(modal) {
        modal.addEventListener("click", function(e) {
          if (e.target === modal) {
            fechar(modal);
          }
        });
      }

      /* abrir modal */
      document.getElementById("abrirEditar").addEventListener("click", function() {
        abrir(modalEditar);
      });

      /* fechar modal */
      document.getElementById("fecharEditar").addEventListener("click", function() {
        fechar(modalEditar);
      });

      fecharFora(modalEditar);

      /* salvar */
      document.getElementById("formEditarPerfil").addEventListener("submit", function(e) {
        e.preventDefault();

        let senha = document.getElementById("editSenha").value;
        let confirmar = document.getElementById("editConfirmar").value;

        if (senha !== confirmar) {
          alert("As senhas não coincidem.");
          return;
        }

        alert("Dados atualizados com sucesso!");
        fechar(modalEditar);
      });

    });
  </script>

</body>

</html>